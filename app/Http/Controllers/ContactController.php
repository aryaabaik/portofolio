<?php
namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\ContactReplyMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(20);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        try {
            Mail::to(config('mail.from.address'))
                ->send(new ContactMail(
                    $validated['name'],
                    $validated['email'],
                    $validated['subject'],
                    $validated['message']
                ));
        } catch (\Throwable $e) {
            // tetap sukses meski email gagal
        }

        return response()->json([
            'message' => 'Pesan berhasil dikirim! Saya akan segera menghubungi kamu.'
        ]);
    }

    public function reply(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'reply_message' => 'required|string',
        ]);

        try {
            Mail::to($contact->email)
                ->send(new ContactReplyMail(
                    $contact->name,
                    $contact->subject,
                    $contact->message,
                    $validated['reply_message']
                ));

            return redirect()->back()->with('success', 'Email balasan berhasil dikirim!');
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal mengirim email: ' . $e->getMessage()]);
        }
    }
}