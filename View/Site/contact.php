

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Contact Form</h1>
        </div>
    </div>
    <?php foreach ($error as $errors) : ?>
        <?=$errors?><br>
    <?php endforeach; ?>

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <hr>
            <form  method="post" "post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Your First Name</label>
                    <input type="text" class="form-control" name="firstname" placeholder="Enter You First Name" value="<?=$form->firstName?>">

                </div>
                <div class="form-group">
                    <label for="name">Your Second Name</label>
                    <input type="text" class="form-control" name="secondname" placeholder="Enter You Second Name" value="<?=$form->secondName?>">

                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter You Email" value="<?=$form->email?>">

                </div>
                <div class="form-group">
                    <label for="message">You Message</label>
                    <textarea name="message" class="form-control" "></textarea>

                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Images</label>
                    <input type="file" name="image" >
                    <p class="help-block">Image download</p>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form_group">
                            <button type="submit" class="btn btn-default">Send</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

