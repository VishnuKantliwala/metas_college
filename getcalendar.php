<?
session_start();
include_once("connect.php");
$cn=new connect(); 
$cn->connectdb();
				
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 1;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;


$sql1 = $cn->selectdb("select * from tbl_calendar_category order by recordListingID DESC LIMIT $limit OFFSET $offset");

if ($cn->numRows($sql1) > 0) 
{
    
    while($row = $cn->fetchAssoc($sql1))
    {
        $i=0;
        
        extract($row);


?>
<div class="col-md-12">
    <h3><a >
            <?echo $cat_name ?></a></h3>
    <div class="my_desc">
        <table>
        <tr>
            <td>NO</td>
            <td>NAME</td>
            <td>FROM DATE</td>
            <td>TO DATE</td>
            <td>DAY</td>
        </tr>
        <?
        $sqlEntries = $cn->selectdb("SELECT * from tbl_calendar where CONCAT(',',cat_id) like '%".$cat_id."%' ORDER BY from_date");
        if( $cn->numRows($sqlEntries) > 0 )
        {
            while($rowEntries = $cn->fetchAssoc($sqlEntries))
            {
                extract($rowEntries);
                $i++;
        ?>
        <tr>
            <td><?echo $i?></td>
            <td><?echo $calendar_name?></td>
            
            <?
            if(strtotime($from_date) == 0)
            {
            ?>
            <td colspan="3"> To be announced </td>

            <?
            }
            else
            {

            
            ?>

            <?
            if(strtotime($to_date) == 0)
            {
            ?>
            <td colspan="2"><?echo $from_date?></td>
            <?
            }
            else
            {
            ?>
            <td dads ><?echo $from_date?></td>            
            <?
            }
            ?>



            <?
            if(strtotime($to_date) != 0)
            {
            ?>
            <td><?echo $to_date?></td>
            <?
            }
            ?>
            <td><?echo date('l',strtotime($from_date))?>
            <?
            if(strtotime($to_date) != 0)
            {
            ?>
                - <?echo date('l',strtotime($to_date))?>
            <?
            }
            ?> 
            </td>
            <?
            }
            ?>
            </tr>
        <?
            }
        } 
        ?>
        
        </table>
    </div>

    
</div>


<?
        }
    }
    else{
        //echo "<script>window.open('Products/".$cid."/1/','_SELF');</script>";
    }
					
?>