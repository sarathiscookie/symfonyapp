<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Create Product</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<h1>Create Products</h1>
<div class="container">
    <?php echo $view['form']->start( $form ); ?>
    <div class="form-group">
        <?php echo $view['form']->label($form['name'], 'Product Name'); ?>
        <?php echo $view['form']->errors( $form['name'] ) ?>
        <?php echo $view['form']->widget( $form['name'], [
            'attr' => [
                'placeholder' => 'Product Name',
                'class'       => 'form-control'
            ]
        ]); ?>
    </div>
    <div class="form-group">
        <?php echo $view['form']->label($form['price'], 'Price'); ?>
        <?php echo $view['form']->errors( $form['price'] ) ?>
        <?php echo $view['form']->widget( $form['price'], [
            'attr' => [
                'placeholder' => 'Price',
                'class'       => 'form-control'
            ]
        ]); ?>
    </div>
    <div class="form-group">
        <?php echo $view['form']->label($form['description'], 'Description'); ?>
        <?php echo $view['form']->errors( $form['description'] ) ?>
        <?php echo $view['form']->widget( $form['description'], [
            'attr' => [
                'placeholder' => 'Description',
                'class'       => 'form-control'
            ]
        ]); ?>
    </div>
    <?php echo $view['form']->widget( $form['save'], [
        'label' => 'Create',
        'attr'  => ['class' => 'btn-block btn-lg btn btn-primary']
    ]) ?>

    <?php echo $view['form']->widget( $form['_token'] ); ?>
    <?php echo $view['form']->end( $form, ["render_rest" => false]) ?>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>