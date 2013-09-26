<div style="width:700;padding-top:5px; float:left;">
 <h2>Dynamic Forms</h2>
</div>
<div style="float:right;text-align:right;padding-top:5px;padding-right:5px;">
 <b><a href="forms.php?a=add" class="Icon">Add New Dynamic Form</a></b></div>
<div class="clear"></div>

<?php
$page = ($_GET['p'] && is_numeric($_GET['p'])) ? $_GET['p'] : 1;
$count = DynamicForm::objects()->filter(array('type'=>'G'))->count();
$pageNav = new Pagenate($count, $page, PAGE_LIMIT);
$pageNav->setURL('forms.php');
$showing=$pageNav->showing().' forms';
?>

<table class="list" border="0" cellspacing="1" cellpadding="0" width="940">
    <thead>
        <tr>
            <th width="7">&nbsp;</th>
            <th>Client Information Form <em>Added to all clients</em></th>
            <th>Last Updated</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach (UserForm::objects()->order_by('title')
                ->limit($pageNav->getLimit())
                ->offset($pageNav->getStart()) as $form) { ?>
        <tr>
            <td/>
            <td><a href="?id=<?php echo $form->get('id'); ?>"><?php echo $form->get('title'); ?></a></td>
            <td><?php echo $form->get('updated'); ?></td>
        </tr>
    <?php } ?>
    </tbody>
    <thead>
        <tr>
            <th width="7">&nbsp;</th>
            <th>Common Ticket Form <em>Added to all tickets</em></th>
            <th>Last Updated</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach (TicketForm::objects()->order_by('title')
                ->limit($pageNav->getLimit())
                ->offset($pageNav->getStart()) as $form) { ?>
        <tr>
            <td/>
            <td><a href="?id=<?php echo $form->get('id'); ?>"><?php echo $form->get('title'); ?></a></td>
            <td><?php echo $form->get('updated'); ?></td>
        </tr>
    <?php } ?>
    </tbody>
    <tbody>
    <caption><?php echo $showing; ?></caption>
    <thead>
        <tr>
            <th width="7">&nbsp;</th>
            <th>Title</th>
            <th>Last Updated</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach (DynamicForm::objects()->filter(array('type'=>'G'))
                ->order_by('title')
                ->limit($pageNav->getLimit())
                ->offset($pageNav->getStart()) as $form) { ?>
        <tr>
            <td/>
            <td><a href="?id=<?php echo $form->get('id'); ?>"><?php echo $form->get('title'); ?></a></td>
            <td><?php echo $form->get('updated'); ?></td>
        </tr>
    <?php }
    ?>
    </tbody>
</table>
<?php
if ($count) //Show options..
    echo '<div>&nbsp;Page:'.$pageNav->getPageLinks().'&nbsp;</div>';
?>
