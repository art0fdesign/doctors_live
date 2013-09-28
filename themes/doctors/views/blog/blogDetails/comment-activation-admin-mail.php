<?php
/**
 * Created by Lemmy.
 * Date: 9/5/12
 * Time: 6:26 PM
 */ ?>
New comment added <hr />
<table>
    <tbody>
    <tr>
        <td>Author</td>
        <td><?php echo $author->first_name . ' ' . $author->last_name; ?></td>
    </tr>
    <tr>
        <td>Username</td>
        <td><?php echo $author->user_name; ?></td>
    </tr>
    <tr>
        <td>E-Mail</td>
        <td><?php echo $author->email; ?></td>
    </tr>
    <tr>
        <td>Date</td>
        <td><?php echo date( 'F jS, Y', strtotime($comment->created_dt) ); ?></td>
    </tr>
    <tr>
        <td>Blog Post</td>
        <td><?php echo @$blog->blog_name; ?></td>
    </tr>
    </tbody>
</table>
<hr />
<?php echo @$settings['comment-admin-message']['set_value']; ?>