<?php
/**
 * @(#) dynamicCustomerData.php 12/01/2015
 *
 * Copyright 1999-2013(c) MijnWinkel B.V. Rijnegomlaan 33, Aerdenhout,
 * North Holland, NL-2114EH, The Netherlands All rights reserved.
 *
 * This software is provided "AS IS," without a warranty of any kind. ALL
 * EXPRESS OR IMPLIED CONDITIONS, REPRESENTATIONS AND WARRANTIES,
 * INCLUDING ANY IMPLIED WARRANTY OF MERCHANTABILITY, FITNESS FOR A
 * PARTICULAR PURPOSE OR NON-INFRINGEMENT, ARE HEREBY EXCLUDED. MYSHOP AND
 * ITS LICENSORS SHALL NOT BE LIABLE FOR ANY DAMAGES OR LIABILITIES
 * SUFFERED BY LICENSEE AS A RESULT OF  OR RELATING TO USE, MODIFICATION
 * OR DISTRIBUTION OF THE SOFTWARE OR ITS DERIVATIVES. IN NO EVENT WILL
 * MYSHOP OR ITS LICENSORS BE LIABLE FOR ANY LOST REVENUE, PROFIT OR DATA, OR
 * FOR DIRECT, INDIRECT, SPECIAL, CONSEQUENTIAL, INCIDENTAL OR PUNITIVE
 * DAMAGES, HOWEVER CAUSED AND REGARDLESS OF THE THEORY OF LIABILITY,
 * ARISING OUT OF THE USE OF OR INABILITY TO USE SOFTWARE, EVEN IF MYSHOP HAS
 * BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.
 *
 * You acknowledge that Software is not designed, licensed or intended
 * for use in the design, construction, operation or maintenance of any
 * nuclear facility.
 *
 *
 * Script dynamicProductData.php
 *
 * Accepts a request from myShop for user data and responds with the correct data if available
 *
 * This class was developed using PHP 5.3.6 with libxml.
 *
 * Version: 0.1
 * Author: Sem van der Wal
 **/

$products = array(
    "productid1" => array(
        "price" => 35.50,
        "stock" => 12
    ),
    "productid2" => array(
        "price" => 12.75,
        "stock" => 7
    ),
    "productid3" => array(
        "price" => 4.35,
        "stock" => 1
    ),
    "productid4" => array(
        "price" => 105,
        "stock" => 0
    ),
    "productid5" => array(
        "price" => 8.95,
        "stock" => 2
    )
);

$response = array();

$productCount = $_REQUEST['productid_count'];
for($i=0;$i<$productCount;$i++){
    if(array_key_exists($_REQUEST['productid'.$i], $products)){
        $response[$i] = $products[$_REQUEST['productid'.$i]];
    }
}

header('Content-type: text/xml');
echo '<?xml version="1.0"?>'."\n";
?>
<rows>
    <? foreach($response as $index=>$product){ ?>
    <row type="catalog" index="<?=$index?>">
        <? foreach($product as $name=>$value){ ?>
        <col name="<?=$name?>"><![CDATA[<?=$value?>]]></col>
        <? } ?>
    </row>
    <? } ?>
</rows>