<?php /* Smarty version 2.6.25, created on 2020-01-30 02:15:30
         compiled from layouts/header.tpl */ ?>
<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="description" content="">

<meta name="author" content="">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">



<link href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
app/stylesheets/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
app/stylesheets/fonts.css" rel="stylesheet">

<link href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
app/stylesheets/jquery.treemenu.css" rel="stylesheet">

<link href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
app/stylesheets/custom.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
app/stylesheets/jquery.datetimepicker.css"/>



<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
app/stylesheets/validationEngine.jquery.css">

<script type="text/javascript"> var SITE_URL = "<?php echo $this->_tpl_vars['SITE_URL']; ?>
"; 

 //vehicle_id = null;

// vehicle_year = null;

var question_limit="<?php echo $this->_tpl_vars['QUESTION_LIMIT']; ?>
";

</script>

<script src="<?php echo $this->_tpl_vars['SITE_URL']; ?>
app/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>

<script src="<?php echo $this->_tpl_vars['SITE_URL']; ?>
app/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>

<script src="<?php echo $this->_tpl_vars['SITE_URL']; ?>
app/js/jquery-ui.js" type="text/javascript" charset="utf-8"></script>

<script src="<?php echo $this->_tpl_vars['SITE_URL']; ?>
app/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>

<script src="<?php echo $this->_tpl_vars['SITE_URL']; ?>
app/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script src="<?php echo $this->_tpl_vars['SITE_URL']; ?>
app/js/jquery.treemenu.js"></script>

<script src="<?php echo $this->_tpl_vars['SITE_URL']; ?>
app/js/kinetic-v5.1.0.min.js"></script>

<script src="<?php echo $this->_tpl_vars['SITE_URL']; ?>
app/js/tinymce/tinymce.min.js"></script>

<script src="<?php echo $this->_tpl_vars['SITE_URL']; ?>
app/js/jquery.datetimepicker.full.js"></script>

<script src="<?php echo $this->_tpl_vars['SITE_URL']; ?>
app/js/common.js"></script>

<script src="<?php echo $this->_tpl_vars['SITE_URL']; ?>
app/js/script.js"></script>



<title><?php echo $this->_tpl_vars['Title']; ?>
</title>



</head>

<div id="outer-wrapper">

<header>

<div class="container">

  <div class="logo"> 



  </div>

</div> 



</header>



<div id="inner-wrapper">

<div class="container">



<?php if (isset ( $this->_supers['session']['userinfo']['UID'] ) && $this->_supers['session']['userinfo']['UID'] != ''): ?>



  <nav class="navbar">

  <ul class="nav nav-tabs">

        <!-- Questions --> 

    <li role="presentation" class="dropdown <?php if ($this->_tpl_vars['CONTROLLER'] == 'question'): ?>active <?php endif; ?>" >

        <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
question" role="button" aria-haspopup="true" aria-expanded="false">Questions<span class="caret"></span></a>

        <ul class="dropdown-menu">

        <li role="presentation"><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
question/index">Manage Questions</a></li>

        <li role="presentation"><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
question/addQuestion">Add New Question</a></li>

      </ul>

      </li>

        <!-- Quiz --> 

      <li role="presentation" class="dropdown <?php if ($this->_tpl_vars['CONTROLLER'] == 'quiz'): ?>active <?php endif; ?>" >

        <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
quiz" role="button" aria-haspopup="true" aria-expanded="false">Quiz<span class="caret"></span></a>

        <ul class="dropdown-menu">

        <li role="presentation"><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
quiz/index">Manage Quizzes</a></li>

        <li role="presentation"><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
quiz/addQuiz">Create New Quiz</a></li>

        <li role="presentation"><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
quiz/addQuestionsToQuiz">Add Questions to Quiz</a></li>

        </ul>

      </li>

      

      <!-- Article -->

      <!--<li role="presentation" class="dropdown <?php if ($this->_tpl_vars['CONTROLLER'] == 'article'): ?>active <?php endif; ?>" >

        <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
article" role="button" aria-haspopup="true" aria-expanded="false">Articles<span class="caret"></span></a>

        <ul class="dropdown-menu">

        <li role="presentation"><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
article">Manage Articles</a></li>

        <li role="presentation"><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
article/addArticle">Add New Article</a></li>

        </ul>

      </li>-->

      

      <!-- Dealer --> 

    <li role="presentation" class="dropdown <?php if ($this->_tpl_vars['CONTROLLER'] == 'dealer'): ?>active <?php endif; ?>" >

        <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
dealer" role="button" aria-haspopup="true" aria-expanded="false">Dealers<span class="caret"></span></a>

        <ul class="dropdown-menu">

        <li role="presentation"><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
dealer/index">Manage Dealer</a></li>

        <li role="presentation"><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
dealer/addDealer">Add New Dealer</a></li>

      </ul>

      </li>

      

    <?php if (( $this->_supers['session']['userinfo']['type'] == $this->_tpl_vars['CMS_ADMIN_TYPE'] )): ?>

    <!-- Sales Associate -->

       <li role="presentation" class="dropdown <?php if ($this->_tpl_vars['CONTROLLER'] == 'salesAssociate'): ?>active <?php endif; ?>" >

        <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
#" role="button" aria-haspopup="true" aria-expanded="false">Sales Associates <span class="caret"></span> </a>

         <ul class="dropdown-menu">

        <li role="presentation"><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
salesAssociate/listing">Manage Sales Associates</a></li>

        <li role="presentation"><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
salesAssociate/addSalesAssociate">Add Sales Associate</a></li>

      </ul>

      </li>

      <?php endif; ?>

      <?php if (( $this->_supers['session']['userinfo']['type'] == $this->_tpl_vars['CMS_ADMIN_TYPE'] )): ?>

      <!-- Leader Board -->   

    <li role="presentation" class="dropdown <?php if ($this->_tpl_vars['CONTROLLER'] == 'leaderBoard'): ?>active <?php endif; ?>" >

        <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
#" role="button" aria-haspopup="true" aria-expanded="false">Leader Board<span class="caret"></span></a>

        <ul class="dropdown-menu">

          <li role="presentation" ><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
leaderBoard">Show Leader Board</a></li> 

      </ul>

      </li>

       <?php endif; ?>

  <!-- Brand Facts -->    

    <li role="presentation" class="dropdown <?php if ($this->_tpl_vars['CONTROLLER'] == 'brandFact' || $this->_tpl_vars['CONTROLLER'] == 'brandFactCategory'): ?>active <?php endif; ?>" >

        <!--<a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
#" role="button" aria-haspopup="true" aria-expanded="false">Brand Facts<span class="caret"></span></a>

          <ul class="dropdown-menu">

            <li role="presentation" ><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
brandFact/index">Manage Brand Facts</a></li> 

          <li role="presentation" ><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
brandFact/addFact">Add New Brand Facts</a></li> 

          <li role="presentation" ><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
brandFactCategory/index">Manage Brand Facts Category</a></li>

          <li role="presentation" ><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
brandFactCategory/addCategory">Add New Brand Facts Category</a></li> 

        </ul>-->

      </li>

    <!-- Brand Facts Category -->    

    <!--<li role="presentation" class="dropdown <?php if ($this->_tpl_vars['CONTROLLER'] == 'brandFactCategory'): ?>active <?php endif; ?>" >

        <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
#" role="button" aria-haspopup="true" aria-expanded="false">Brand Facts Category<span class="caret"></span></a>

        <ul class="dropdown-menu">

          

          

      </ul>

      </li>-->

      <?php if (( $this->_supers['session']['userinfo']['type'] == $this->_tpl_vars['CMS_ADMIN_TYPE'] )): ?>

       <!-- App Settings  -->    

    <li role="presentation" class="dropdown <?php if ($this->_tpl_vars['CONTROLLER'] == 'setting'): ?>active <?php endif; ?>">

       <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
#" role="button" aria-haspopup="true" aria-expanded="false">Settings<span class="caret"></span></a>

        <ul class="dropdown-menu">

          <li role="presentation" ><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
setting">Manage App Settings</a></li> 

        </ul>-->

      </li>

      <?php endif; ?>

  

    <!-- My Profile -->

      <li role="presentation" class="dropdown <?php if ($this->_tpl_vars['CONTROLLER'] == 'user'): ?>active <?php endif; ?>" >

        <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
#" role="button" aria-haspopup="true" aria-expanded="false">Hello <?php echo $this->_supers['session']['userinfo']['firstname']; ?>
<span class="caret"></span></a>

        <ul class="dropdown-menu">

          <li role="presentation" ><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
user/myProfile">My Profile</a></li> 

          <?php if (( isset ( $this->_supers['session']['userinfo']['type'] ) && $this->_supers['session']['userinfo']['type'] == $this->_tpl_vars['CMS_ADMIN_TYPE'] )): ?>

          <li role="presentation" ><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
user/addUser">Create CMS User</a></li> 

          <li role="presentation" ><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
user/index/1">Manage CMS Users</a></li> 

          

          <?php endif; ?>

          <li role="presentation"  ><a href="<?php echo $this->_tpl_vars['SITE_URL']; ?>
login/logout">Logout</a></li>

          </ul>

      </li> 

      

      

  </ul>

  </nav>

<?php else: ?>

  <div class="mar-top-90">

  </div>

    

<?php endif; ?>



 <?php if ($this->_tpl_vars['ExceptionError']): ?>

<p><?php echo $this->_tpl_vars['ExceptionError']; ?>
</p>

<?php endif; ?>