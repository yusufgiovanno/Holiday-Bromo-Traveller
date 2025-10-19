<?php

/**
 * @author Yusuf Giovanno <
 */

defined('ABSPATH') || die('Cant access directly');

class PlannerAjaxHandler extends SanitizeAndValidate {

    private $_data = [
        'nonce'      => false,
        'date'       => false,
        'duration'   => false,
        'group_size' => false,
        'whatsapp'   => false,
        'email'      => false,
    ];

    public function __construct() {
        add_action('wp_ajax_nopriv_submit_planner_form', [$this, 'handle_form_submission']);
        add_action('wp_ajax_submit_planner_form', [$this, 'handle_form_submission']);
    }

    public function handle_form_submission() {
        $this->_data = $this->main($this->_data, $_POST, 'planner_form_nonce');
        $this->_response();
    }

    public function _response() {
        $site_name = get_bloginfo('name');
        $subject = sprintf('[%s] New Planner Submission — %s', $site_name, $this->_data['date']);

        // Build email body
        $body = $this->buildEmailTemplate($site_name, $this->_data);

        // Headers
        $headers = ['Content-Type: text/html; charset=UTF-8'];
        if (is_email($this->_data['email'])) {
            $headers[] = 'Reply-To: ' . $this->_data['email'];
        }

        // Send to admin
        $to   = get_option('admin_email');
        $sent = wp_mail($to, wp_strip_all_tags($subject), $body, $headers);

        if ($sent) {
            wp_send_json_success(['message' => 'Thank you — your planner submission was sent.']);
        } else {
            wp_send_json_error(['message' => 'Email failed to send.']);
        }
    }

    public function buildEmailTemplate($site_name, $data){
        $fields = array_map('esc_html', $data);

        return '
            <!doctype html>
            <html>
            <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <style>
                body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial; background:#f6f7f9; color:#333; margin:0; padding:0; }
                .wrap { max-width:700px; margin:24px auto; background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 6px 18px rgba(0,0,0,0.06); }
                .header { padding:20px 24px; background:linear-gradient(90deg,#4f46e5,#06b6d4); color:#fff; }
                .header h1 { margin:0; font-size:20px; }
                .body { padding:24px; }
                table { width:100%; border-collapse:collapse; }
                td { padding:12px 8px; border-bottom:1px solid #f0f0f2; vertical-align:top; }
                .label { width:40%; color:#666; font-size:14px; }
                .value { font-size:15px; font-weight:600; color:#111; }
                .footer { padding:16px 24px; background:#fafafa; font-size:13px; color:#888; text-align:center; }
            </style>
            </head>
            <body>
            <div class="wrap">
                <div class="header">
                <h1>New Planner Submission</h1>
                </div>
                <div class="body">
                <p>You have received a new planner submission from <strong>' . esc_html($site_name) . '</strong>.</p>
                <table>
                    <tr><td class="label">Date</td><td class="value">' . date('d M Y', strtotime($fields['date'])) . '</td></tr>
                    <tr><td class="label">Duration</td><td class="value">' . $fields['duration'] . '</td></tr>
                    <tr><td class="label">Group Size</td><td class="value">' . $fields['group_size'] . '</td></tr>
                    <tr><td class="label">WhatsApp</td><td class="value">' . ($fields['whatsapp'] ?: '—') . '</td></tr>
                    <tr><td class="label">Email</td><td class="value">' . ($fields['email'] ?: '—') . '</td></tr>
                </table>
                </div>
                <div class="footer">
                &copy; ' . date('Y') . ' ' . esc_html($site_name) . ' — Planner Notifications
                </div>
            </div>
            </body>
            </html>';
    }

}

new PlannerAjaxHandler();
