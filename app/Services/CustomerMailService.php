<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\ContactMessage;
use App\Models\QuoteRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CustomerMailService
{
    /**
     * Get sender email address.
     */
    public static function getFromAddress(): string
    {
        $from = config('mail.from.address');
        if (empty($from) || $from === 'hello@example.com') {
            return config('mail.mailers.smtp.username') ?: 'info@premiumbuildingandpest.com.au';
        }
        return $from;
    }

    /**
     * Get sender name.
     */
    public static function getFromName(): string
    {
        return config('mail.from.name') ?: 'Premium Building & Pest Inspections';
    }

    /**
     * Send automatic confirmation when customer submits an inspection booking.
     */
    public static function sendBookingConfirmation(Booking $booking): bool
    {
        if (empty($booking->email)) {
            return false;
        }

        try {
            $subject = 'Booking Request Received - Ref #' . $booking->id . ' - Premium Building & Pest Inspections';
            $fromAddress = self::getFromAddress();
            $fromName = self::getFromName();

            Mail::send('emails.booking-notification', [
                'booking' => $booking,
                'subjectLine' => $subject,
                'introMessage' => 'Thank you for submitting your inspection booking request with Premium Building & Pest Inspections. We have received your booking details and our team will contact you shortly to confirm your scheduled appointment.',
                'customMessage' => null,
            ], function ($message) use ($booking, $subject, $fromAddress, $fromName) {
                $message->to($booking->email, $booking->name)
                        ->from($fromAddress, $fromName)
                        ->replyTo($fromAddress, $fromName)
                        ->subject($subject);
            });

            Log::info("Booking confirmation email sent to {$booking->email} for Booking #{$booking->id}");
            return true;
        } catch (\Throwable $e) {
            Log::error("Failed to send booking confirmation email to {$booking->email}: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Send booking status update to customer.
     */
    public static function sendBookingStatusUpdate(Booking $booking, ?string $customNote = null): bool
    {
        if (empty($booking->email)) {
            return false;
        }

        try {
            $statusTitle = ucfirst($booking->status);
            $subject = "Booking #{$booking->id} Status Update: {$statusTitle} - Premium Building & Pest Inspections";

            $intro = match ($booking->status) {
                'confirmed' => 'Good news! Your inspection booking has been officially CONFIRMED. Our inspector is scheduled to attend the property at the agreed date and time.',
                'completed' => 'Your building and pest inspection has been COMPLETED. We appreciate your business and trust in our licensed inspection services.',
                'cancelled' => 'Your inspection booking has been marked as CANCELLED. If this was unexpected or if you wish to reschedule, please get in touch with our team.',
                default => "Your inspection booking status has been updated to {$statusTitle}.",
            };

            Mail::send('emails.booking-notification', [
                'booking' => $booking,
                'subjectLine' => $subject,
                'introMessage' => $intro,
                'customMessage' => $customNote,
            ], function ($message) use ($booking, $subject) {
                $message->to($booking->email, $booking->name)
                        ->subject($subject);
            });

            Log::info("Booking status update ({$booking->status}) email sent to {$booking->email}");
            return true;
        } catch (\Throwable $e) {
            Log::error("Failed to send booking status email to {$booking->email}: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Send a custom email composed by admin directly to booking customer.
     */
    public static function sendBookingCustomEmail(Booking $booking, string $subject, string $messageContent): bool
    {
        if (empty($booking->email)) {
            return false;
        }

        try {
            Mail::send('emails.general-message', [
                'recipientName' => $booking->name,
                'subjectLine' => $subject,
                'introMessage' => "Regarding your inspection booking (Ref #{$booking->id}):",
                'messageContent' => $messageContent,
                'referenceDetails' => [
                    'Booking Reference' => '#' . $booking->id,
                    'Service' => $booking->service_type,
                    'Property' => $booking->property_address,
                    'Booking Status' => ucfirst($booking->status),
                ],
            ], function ($message) use ($booking, $subject) {
                $message->to($booking->email, $booking->name)
                        ->subject($subject);
            });

            Log::info("Custom admin email sent to booking customer {$booking->email}");
            return true;
        } catch (\Throwable $e) {
            Log::error("Failed to send custom email to {$booking->email}: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Send automatic confirmation when customer requests an inspection quote.
     */
    public static function sendQuoteConfirmation(QuoteRequest $quote): bool
    {
        if (empty($quote->email)) {
            return false;
        }

        try {
            $subject = 'Quote Request Received - Ref #' . $quote->id . ' - Premium Building & Pest Inspections';
            $fromAddress = self::getFromAddress();
            $fromName = self::getFromName();

            Mail::send('emails.quote-notification', [
                'quote' => $quote,
                'subjectLine' => $subject,
                'introMessage' => 'Thank you for requesting an estimate from Premium Building & Pest Inspections. We have received your inquiry and our team is preparing a comprehensive quote for your inspection needs.',
                'customMessage' => null,
            ], function ($message) use ($quote, $subject, $fromAddress, $fromName) {
                $message->to($quote->email, $quote->name)
                        ->from($fromAddress, $fromName)
                        ->replyTo($fromAddress, $fromName)
                        ->subject($subject);
            });

            Log::info("Quote confirmation email sent to {$quote->email} for Quote #{$quote->id}");
            return true;
        } catch (\Throwable $e) {
            Log::error("Failed to send quote confirmation to {$quote->email}: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Send quote status update to customer.
     */
    public static function sendQuoteStatusUpdate(QuoteRequest $quote, ?string $customNote = null): bool
    {
        if (empty($quote->email)) {
            return false;
        }

        try {
            $statusTitle = ucfirst($quote->status);
            $subject = "Quote Request #{$quote->id} Update: {$statusTitle} - Premium Building & Pest Inspections";

            $intro = match ($quote->status) {
                'contacted' => 'Our team has reviewed your quote request and our inspector has reached out to discuss your property inspection requirements.',
                'quoted' => 'Your inspection quote has been prepared. Please review the details below or contact our office to schedule your inspection appointment.',
                'closed' => "Your quote request has been marked as completed/closed. Thank you for considering Premium Building & Pest Inspections.",
                default => "Your quote request status has been updated to {$statusTitle}.",
            };

            Mail::send('emails.quote-notification', [
                'quote' => $quote,
                'subjectLine' => $subject,
                'introMessage' => $intro,
                'customMessage' => $customNote,
            ], function ($message) use ($quote, $subject) {
                $message->to($quote->email, $quote->name)
                        ->subject($subject);
            });

            Log::info("Quote status email sent to {$quote->email}");
            return true;
        } catch (\Throwable $e) {
            Log::error("Failed to send quote status email to {$quote->email}: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Send a custom email composed by admin directly to quote client.
     */
    public static function sendQuoteCustomEmail(QuoteRequest $quote, string $subject, string $messageContent): bool
    {
        if (empty($quote->email)) {
            return false;
        }

        try {
            Mail::send('emails.general-message', [
                'recipientName' => $quote->name,
                'subjectLine' => $subject,
                'introMessage' => "Regarding your quote inquiry (Ref #{$quote->id}):",
                'messageContent' => $messageContent,
                'referenceDetails' => [
                    'Quote Reference' => '#' . $quote->id,
                    'Requested Service' => $quote->service_type ?? 'General Inspection',
                    'Property' => $quote->property_address ?? 'Not specified',
                    'Status' => ucfirst($quote->status),
                ],
            ], function ($message) use ($quote, $subject) {
                $message->to($quote->email, $quote->name)
                        ->subject($subject);
            });

            Log::info("Custom quote email sent to {$quote->email}");
            return true;
        } catch (\Throwable $e) {
            Log::error("Failed to send custom quote email to {$quote->email}: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Send automatic confirmation when customer sends contact form inquiry.
     */
    public static function sendContactConfirmation(ContactMessage $contactMessage): bool
    {
        if (empty($contactMessage->email)) {
            return false;
        }

        try {
            $subject = 'We Received Your Message - Premium Building & Pest Inspections';
            $fromAddress = self::getFromAddress();
            $fromName = self::getFromName();

            Mail::send('emails.general-message', [
                'recipientName' => $contactMessage->name,
                'subjectLine' => $subject,
                'introMessage' => 'Thank you for getting in touch with Premium Building & Pest Inspections. We have received your inquiry and our support team will reply to you as soon as possible.',
                'messageContent' => "A copy of your message:\n\nSubject: {$contactMessage->subject}\n\n\"{$contactMessage->message}\"",
                'referenceDetails' => [
                    'Inquiry Ref' => '#' . $contactMessage->id,
                    'Date Received' => now()->format('d M Y, h:i A'),
                ],
            ], function ($message) use ($contactMessage, $subject, $fromAddress, $fromName) {
                $message->to($contactMessage->email, $contactMessage->name)
                        ->from($fromAddress, $fromName)
                        ->replyTo($fromAddress, $fromName)
                        ->subject($subject);
            });

            Log::info("Contact confirmation email sent to {$contactMessage->email}");
            return true;
        } catch (\Throwable $e) {
            Log::error("Failed to send contact confirmation email to {$contactMessage->email}: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Send email reply to a contact inquiry directly from Admin.
     */
    public static function sendContactReply(ContactMessage $contactMessage, string $subject, string $replyContent): bool
    {
        if (empty($contactMessage->email)) {
            return false;
        }

        try {
            Mail::send('emails.general-message', [
                'recipientName' => $contactMessage->name,
                'subjectLine' => $subject,
                'introMessage' => "In response to your inquiry regarding '{$contactMessage->subject}':",
                'messageContent' => $replyContent,
                'referenceDetails' => [
                    'Original Inquiry Ref' => '#' . $contactMessage->id,
                    'Original Subject' => $contactMessage->subject,
                ],
            ], function ($message) use ($contactMessage, $subject) {
                $message->to($contactMessage->email, $contactMessage->name)
                        ->subject($subject);
            });

            Log::info("Admin reply email sent to {$contactMessage->email} for Message #{$contactMessage->id}");
            return true;
        } catch (\Throwable $e) {
            Log::error("Failed to send reply email to {$contactMessage->email}: " . $e->getMessage());
            return false;
        }
    }
}
