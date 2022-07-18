<?php

    function pr($arr){
        echo '<pre>';
        print_r ($arr);
    } //Array check karna ho to

    function prx($arr){
        echo '<pre>';
        print_r ($arr);
        die();
    }

    function get_products($con,$cat_id='',$product_id=''){
        $sql="select products.*,category.catid from products,category where products.status=1 ";
        if($cat_id!=''){
            $sql.=" and products.category=$cat_id ";
        }
        if($product_id!=''){
            $sql.=" and products.product_id=$product_id ";
        }
        $sql.=" and products.category=category.catid ";
        $sql.=" order by products.product_id desc";
        $res=mysqli_query($con,$sql);
        $data=array();
        while($row=mysqli_fetch_assoc($res)){
            $data[]=$row;
        }
        return $data;
    }
    function get_product($con)
    {
        $sql="select * from products where status=1";
        $res=mysqli_query($con,$sql);
        $data=array();
        while($row=mysqli_fetch_assoc($res)){
            $data[]=$row;
        }
        return $data;
    }
    function get_order($con,$username)
    {
        $sql="select * from orders where isordered=0 and username='$username'";
        $res=mysqli_query($con,$sql);
        $data=array();
        while($row=mysqli_fetch_assoc($res)){
            $data[]=$row;
        }
        return $data;
    }
?>