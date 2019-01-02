<?php
	if (!isset($_SESSION["cart"])) 
	{
		$_SESSION["cart"] = array();
	}

	//thêm product vào giỏ hàng
	function add_item($proId, $q) 
	{
		if (array_key_exists($proId, $_SESSION["cart"])) 
		{
			$_SESSION["cart"][$proId] += $q;
		} 
		else 
		{
			$_SESSION["cart"][$proId] = $q;
		}
	}

	//bỏ chọn sản phẩm 
	function delete_item($proId) 
	{
		unset($_SESSION["cart"][$proId]);
	}

	//cập nhật lại số lượng sp
	function update_item($proId, $q) 
	{
		$_SESSION["cart"][$proId] = $q;
	}

	//lấy tổng số lượng sản phẩm
	function get_total_items() 
	{
		$total = 0;
		foreach ($_SESSION["cart"] as $proId => $q) 
		{
			$total += $q;
		}
		return $total;
	}
?>