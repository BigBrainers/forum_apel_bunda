<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Apel Bunda</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/css/styles.css"/>
	<script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
        <?= $this->include('navbar')?>
    </header>
    <main class="container" id="startChange">
    <div class="container-post">
                    <?php
                        foreach ($questions as $question){
                            $q_user_id = $question->q_user_id;
                            if($question->q_ishassolution == true){
                                $hassolution = true;
                            }else{
                                $hassolution = false;
                            }
                    ?>
            <div class="row">
            <div class="col col-md-8 mx-auto">
                <div class="mb-3">
                    <div class="card">
                    <div class="card-header" >
                        <div class="row">
                            <div class="col-8">
                                <span class="text-muted">pada <?= date('l, d F Y, ', strtotime($question->q_date));?></span>
                                <span class="text-muted">oleh</span> <a href="<?= base_url('user/profile/'.$question->user_username)?>"><i><?= $question->user_username;?></i></a>
                                <h3><?= $question->q_title;?>
                            <?php if($hassolution == true){ ?>
                                <icon style="color: green;"><?= file_get_contents("icons/check.svg"); ?></icon>
                            <?php }?>
                            </h3>
                            </div>
                            <div class="col-4">
                            <?php if( session()->get('isAdmin') == TRUE){?>
                                <button class="btn btn-outline-danger delBtn float-right m-1"
                                    data-q_id="<?= $question->q_id?>" >
                                    <?php echo file_get_contents("icons/trash.svg"); ?>
                                </button>
                            <?php }?>
                            <?php if($question->q_user_id == session()->get('id')){ ?>
                                <button class="btn btn-outline-dark editBtn float-right m-1"
                                    data-id="<?= $question->q_id?>" 
                                    data-body="<?= $question->q_body ?>"
                                    data-user_id="<?= $question->q_user_id ?>"
                                    data-title="<?= $question->q_title?>">
                                    <?= file_get_contents("icons/pencil.svg"); ?>
                                </button>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="font-size: 15pt;"> 
                        <p><?= nl2br($question->q_body);?></p>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
            <div class="row">
                <div class="col col-sm-12 col-md-10 mx-auto">
                <div class="article-card card mb-3 border-primary">
                    <div class="card-body display-block">
                    <form action="<?= base_url('qna/add-answer')?>" method="POST">
                        <label for="answer"><h4>Jawaban anda</h4></label>
                        <textarea 
                        class="form-control" 
                        name="a_body"
                        id="answer"
                        required
                        ></textarea>
                        <input name="a_question_id" type="text" value="<?= $question->q_id?>" hidden>
                        <input name="q_user_id" type="text" value="<?= $question->q_user_id?>" hidden>
                        <button type="submit" class="btn btn-primary mt-2">Jawab!</button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            <?php
                    }
                ?>
                <div class="row mb-5">
                    <div class="col-sm-10 offset-sm-1">
                        <div class="article-card card mb-5 no-border">
                                <div class=" card-header">
                                <h3>Jawaban: </h3>
                                </div>                
                        <?php
                        if (count($answers) > 0 ){
                            foreach ($answers as $key => $answer){
                                if($answer->a_issolution){
                        ?>
                            <div class="row order-1">
                            <div class="col-sm-10 mx-auto">
                            <div class=" card mb-3 mt-3 border-success">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col col-8">
                                        <p style="color: green;">Solusi! <icon style="color: green;"><?= file_get_contents("icons/check.svg"); ?></icon></p>
                                        <i>oleh : <?= $answer->user_username;?></i>
                                        <p class="text-muted">pada <?= $answer->a_date;?></p>
                                        </div>
                                        <div class="col col-4">
                                        <?php if( session()->get('id') == $q_user_id && $hassolution == true){?>
                                        <form action="<?= base_url('user/revokesolution')?>"  method="POST">
                                            <input type="text" name="q_user_id" hidden value="<?= $q_user_id; ?>">
                                            <input type="text" name="a_id" hidden value="<?= $answer->a_id; ?>">
                                            <input type="text" name="q_id" hidden value="<?= $answer->a_question_id; ?>">
                                            <button data-toggle="tooltip" data-placement="top" title="hapus dari solusi" type="submit" class="btn btn-outline-danger float-right m-1"><?php echo file_get_contents("icons/check.svg"); ?></button>
                                        </form>
                                        <?php }?>
                                        </div>
                                    </div>
                                </div>    
                                <div class="card-body">
                                        <p><?= nl2br($answer->a_body);?></p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <?php }else {?>
                        <div class="row order-<?= $key+2 ?> ">
                        <div class="col-sm-10 mx-auto">
                            <div class=" card mb-3 mt-3 border">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col col-8">
                                        <i>oleh : <?= $answer->user_username;?></i>
                                        <p class="text-muted">pada <?= $answer->a_date;?></p>
                                        </div>
                                        <div class="col col-4">
                                        <?php if( session()->get('isAdmin') == TRUE){?>
                                        <button class="btn btn-outline-danger aDelBtn float-right m-1"
                                            data-a_id="<?= $answer->a_id; ?>"
                                            data-q_id="<?= $answer->a_question_id; ?>"
                                            >
                                            <?php echo file_get_contents("icons/trash.svg"); ?>
                                        </button>
                                        <?php }?>
                                        <?php if( session()->get('id') == $q_user_id && $hassolution == false){?>
                                        <form action="<?= base_url('user/marksolution')?>"  method="POST">
                                            <input type="text" name="q_user_id" hidden value="<?= $q_user_id; ?>">
                                            <input type="text" name="a_id" hidden value="<?= $answer->a_id; ?>">
                                            <input type="text" name="q_id" hidden value="<?= $answer->a_question_id; ?>">
                                            <button data-toggle="tooltip" data-placement="top" title="tandai sebagai solusi" type="submit" class="btn btn-outline-success float-right m-1"><?php echo file_get_contents("icons/check.svg"); ?></button>
                                        </form>
                                        <?php }?>
                                        <?php if($answer->a_user_id == session()->get('id')){ ?>
                                                <button class="btn btn-outline-dark editAnswerBtn float-right m-1"
                                                data-id="<?= $answer->a_id?>" 
                                                data-body="<?= $answer->a_body ?>"
                                                data-q_id="<?= $answer->a_question_id ?>"
                                                data-user_id="<?= $answer->a_user_id ?>">
                                                <?php echo file_get_contents("icons/pencil.svg"); ?>
                                            </button>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>    
                                <div class="card-body">
                                        <p><?= nl2br($answer->a_body);?></p>
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php
                            }
                            }
                        }else{?>
                            <div class="col-sm-8 offset-sm-2">
                                <div><p class="text-center">Belum ada jawaban</p></div>
                            </div>
                        <?php }
                        ?>
                        </div>
                        </div>
                    </div>
                </div>
        <?= $this->include('navbar-bottom')?>
        <?= $this->include('add-modal')?>
        <?= $this->include('edit-modal')?>
        <?= $this->include('edit-answer')?>
        <?= $this->include('delete-prompt')?>
        <?= $this->include('delete-answer')?>
    </main>
</body>
</html>
