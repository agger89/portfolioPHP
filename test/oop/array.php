<h1>Function</h1>
<?php
$adata = ['a', 'b', 'c'];
array_push($adata, 'd');
foreach ($adata as $item){
    echo $item.'<br>';
}
var_dump(count($adata));
?>
<h1>Object</h1>
<?php
$odata = new ArrayObject(['a', 'b', 'c']);
$odata->append('d');
foreach ($odata as $item){
    echo $item.'<br>';
}
var_dump($odata->count());
?>
