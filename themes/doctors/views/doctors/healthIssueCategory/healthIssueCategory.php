<?php
/**
 * Created by Lemmy.
 * Date: 9/25/12
 * Time: 10:31 PM
 */?>
<h1 class="title"><?php echo $category->cat_name_issue; ?> - list of ilness:</h1>
<div id="tabs" style="width:550px !important; margin:0; display:table; padding:0 0 30px 0;" align="left">
<!--<div class="clear"></div>-->
    <ul style="display:table; width:99%; padding-bottom:2px;">
        <?php foreach($files as $key=>$models): ?>
        <li style="display:table;"><a style="height:auto; width:9.5px; padding:3px;" href="#tabs-<?php echo $key;?>"><?php echo strtoupper($key); ?></a></li>
        <?php endforeach; ?>
    </ul>

<?php foreach($files as $key=>$models): ?>
    <div id="tabs-<?php echo $key; ?>" style="padding-left: 0; padding-right: 0">
        <h1 class="title" style="margin-top:3px; margin-bottom: 6px"><?php echo strtoupper($key); ?><span style="font-size:14px;">
            <?php if(!(count($models) <= $pageSize)): ?>
                <div id="Pagination_<?php echo $key?>" style="float: right; padding-right: 10px">
                </div>
                <?php endif ?>
        </span></h1>
            <?php
                $seoNames = array();
                foreach($models as $mod)
                    $seoNames[] = MyFunctions::parseForSEO($mod);
                ?>
            <?php if(!empty($models)): ?>
            <!--<div class="clear"></div>-->

            <!--<h1 class="title"><?php //echo strtoupper($key); ?></h1>-->

            <!--<div style="height:240px;">-->
                <div id="Searchresult_<?php echo $key?>_1" class="health_links" style="width:95%;">
                </div>

                <div id="Searchresult_<?php echo $key?>_2" class="health_links" style="width:95%;">
                </div>

                <div id="Searchresult_<?php echo $key?>_3" class="health_links" style="width:95%;">
                </div>
            <!--</div>-->

            <!--<div class="clear"></div>-->




            <script type="text/javascript">

                function pageselectCallback_<?php echo $key?>(page_index, jq){
                    var items_per_page = <?php echo $pageSize;?>;
                    var max_elem = Math.min((page_index+1) * <?php echo $pageSize;?>, <?php echo count($models); ?>);
                    var members = [];
                    var seomembers = [];
                    members = <?php echo CJavaScript::encode($models); ?>;
                    seomembers = <?php echo CJavaScript::encode($seoNames); ?>;

                    var newcontent = [];
                    var seonames = [];
                    for(var i=page_index*<?php echo $pageSize;?>;i<max_elem;i++)
                    {
                        newcontent[i - page_index*<?php echo $pageSize;?>] = members[i];
                        seonames[i - page_index*<?php echo $pageSize;?>] = seomembers[i];
                    }

                    //for(var m=0;m<newcontent.length;m++){
                    //document.write("<b>newcontent["+m+"] is </b>=>"+newcontent[m]+"<br>");
                    //}
                    var newcontent1 = '';
                    for(var j=0; j< Math.ceil((<?php echo $pageSize;?>)/3);j++)
                    {
                        if(typeof newcontent[j] !== "undefined")
                            newcontent1 += '<a href="<?php echo $url;?>/'+seonames[j]+'">' + newcontent[j] + '</a>';
                    }
                    $('#Searchresult_<?php echo $key?>_1').html(newcontent1);

                    var newcontent2 = '';
                    for(var k=Math.ceil((<?php echo $pageSize;?>)/3); k< 2*(Math.ceil((<?php echo $pageSize;?>)/3));k++)
                    {
                        if(typeof newcontent[k] !== "undefined")
                            newcontent2 += '<a href="<?php echo $url;?>/'+seonames[k]+'">' + newcontent[k] + '</a>';
                    }
                    $('#Searchresult_<?php echo $key?>_2').html(newcontent2);

                    var newcontent3 = '';
                    for(var l=2*(Math.ceil((<?php echo $pageSize;?>)/3)); l< 3*(Math.ceil((<?php echo $pageSize;?>)/3));l++)
                    {
                        if(typeof newcontent[l] !== "undefined")
                            newcontent3 += '<a href="<?php echo $url;?>/'+seonames[l]+'">' + newcontent[l] + '</a>';
                    }
                    $('#Searchresult_<?php echo $key?>_3').html(newcontent3);

                    return false;
                }

                function initPagination_<?php echo $key?>() {
                    $("#Pagination_<?php echo $key?>").pagination(<?php echo count($models); ?>, {
                        callback: pageselectCallback_<?php echo $key?>,
                        items_per_page:<?php echo $pageSize; ?>,
                        num_edge_entries:2,
                        load_first_page:true
                        //show_if_single_page:false
                    });
                }
                $(document).ready(function(){
                    /*firstItems_<?php //echo $key?>();*/
                    initPagination_<?php echo $key?>();
                });

            </script>
            <?php endif ?>
    </div>
<?php endforeach ?>

</div>

<script type="text/javascript">

    $(function() {
        $( "#tabs" ).tabs();
    });

</script>