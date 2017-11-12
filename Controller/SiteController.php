<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11.11.17
 * Time: 22:09
 */
namespace Controller;


use Library\Controller;
use Library\DbConnection;
use Library\Request;
use Model\ContactForm;
use Model\Feedback;
use Model\Image;
use Model\Mapper;
use Swift_Mailer;
use Swift_SmtpTransport;
use Swift_Message;

class SiteController extends Controller
{
    public function indexAction(Request $request)
    {

    }


    public function contactAction( Request $request)
    {
        $form = new ContactForm($request);
        $maper = new Mapper();


        if($request->isPost()){
            $image = new Image();

            if($form->isValid() && $image->isValid()) {
                $feedback = (new Feedback())
                    ->setFirstName($form->firstName)
                    ->setSecondName($form->secondName)
                    ->setEmail($form->email)
                    ->setMessage($form->message)
                    ->setImagePath($image::UPLOAD_DIR)
                    ->setImage($image->getName());
                $image->save();
                $maper->save($feedback);


                $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
                    ->setUsername('radchuk.anton@gmail.com')
                    ->setPassword('portland963')
                ;

                $mailer = new Swift_Mailer($transport);

                $message = (new Swift_Message('Wonderful Subject'))
                    ->setFrom(['radchuk.anton@gmail.com' => 'Anton Radchuk'])
                    ->setTo([$form->email => $form->firstName])
                    ->setBody('hello world')
                    ->setCharset('UTF-8');
                ;

                $result = $mailer->send($message);

            }
        }

        return $this->render('contact', ['form' => $form]);
    }
}