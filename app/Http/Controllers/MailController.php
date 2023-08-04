<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;
use App\Mail\FeedbackEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class MailController extends Controller
{
  public function verify(EmailVerificationRequest $r)
  {
    $r->fulfill();
    return redirect()->route('welcome');
  }

  public function verify_send(Request $request)
  {
    $request->user()->sendEmailVerificationNotification();
    return redirect()->route('welcome');
  }

  public function feedbackSend(Request $r)
  {
    $validator = Validator::make($r->all(), [
      'nameFeedback' => 'required',
      'emailFeedback' => 'required',
      'message' => 'required|max:500',
    ]);
    if ($validator->fails()) {
      return response()->json(['errors' => $validator->errors()], 400);
    } else {
      $data = new stdClass();
      $data->name = $r->nameFeedback;
      $data->email = $r->emailFeedback;
      $data->message = $r->message;
      Mail::to("germ4n.budantsev@yandex.ru")->send(new FeedbackEmail($data));
    }
  }
}
