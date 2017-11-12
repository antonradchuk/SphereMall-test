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
use Library\FlashMessage;
use Library\Request;
use Library\Router;
use Model\ContactForm;
use Model\Feedback;
use Model\Image;
use Model\FeadbackSaver;
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
        $saver = new FeadbackSaver();
        $error = $form->error;



        if($request->isPost()){
            $image = new Image($request);

            if($form->isValid()){
                if($image->isValid()) {
                    $feedback = new Feedback($form, $image);
                    $image->save();
                    $saver->save($feedback)
                    ;

                    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
                        ->setUsername('radchuk.anton@gmail.com')
                        ->setPassword('portland963')
                    ;

                    $mailer = new Swift_Mailer($transport);

                    $message = (new Swift_Message('Wonderful Subject'))
                        ->setFrom(['radchuk.anton@gmail.com' => 'Anton Radchuk'])
                        ->setTo([$form->email => $form->firstName])
                        ->setBody('hello world')
                        ->setCharset('UTF-8')
                    ;

                   $mailer->send($message);

                   FlashMessage::setFlash('Feedback saved');
                    //Router::redirect('/index.php?site/contact');
                }
            }
        }

        return $this->render('contact', ['form' => $form]);
    }
}