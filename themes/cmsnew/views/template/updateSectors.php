<div class="titleBlock">
    <span>Update Sectors file: <?php echo $fileName ?></span>

    <span class="blockMenu">
        <a id="ace_update" href="#">Update</a>&nbsp;
    </span>

</div>


<div class="wideContent">

    <pre class="widget ace_wrapper" id="editor"><?php echo htmlspecialchars($code)?></pre>
    
    <script>
        var aceData = 'not-changed';
        var editor = ace.edit('editor');
        editor.setTheme('ace/theme/cloud');
        editor.getSession().setMode('ace/mode/php');
        editor.getSession().on('change', function(e) {
            aceData = editor.getSession().getValue();
        });
        /* update content */
        $('#ace_update').click(function(e){
            e.preventDefault();
            if( aceData == 'not-changed' ) {
                alert( 'Nothing to update. Content is not changed.' );
            } else {
                if(  confirm('Are you sure?') ){
                    $.ajax({
                        type: 'post',
                        dataType: 'json', 
                        data: {file_content: aceData},
                    }).done(function( data ){
                        if( data.result=='ok' ){
                            aceData = 'not-changed';
                            alert( 'File is successfully updated!' );
                        } else {
                            alert( 'Sorry, something went wrong' );
                        }
                        //if( console && console.log ) {
                        //    console.log(data.result);
                        //}
                    });
                }
            }
        });
    </script>
    
</div>
