<?php

include_once("../functions/library.php");


class action_order extends library
{

	public function getListOrder(){

	    global $conn_vn;

		$rows = array();

		/** Câu lệnh sql cũ */
        /*$sql = "
              SELECT ca.*, cu.*, orst.* FROM order_state as orst
                inner join cart as ca 
                inner join account as cu 
                on ca.id_account = cu.id_account and 
                ca.id_orderState = orst.id_orderState 
                order by id_cart desc
                ";*/

        /** Không có order_state_id để join */
        /*$sql = "
            SELECT orst.*, cart.* FROM order_state as orst
            INNER JOIN cart ON 
            cart.id_orderState = orst.order_state_id
            ORDER BY id_cart DESC 
        ";*/
        $sql = "
            SELECT * FROM cart
            ORDER BY cart.id_cart DESC 
        ";
        $rs = mysqli_query($conn_vn, $sql);
        $total = mysqli_num_rows($rs);
        unset($sql);

        if ($total > 0)
        {
            while ($row = mysqli_fetch_assoc($rs))
            {
                $rows[] = $row;
            }
        }
        return $rows;
	}

	public function getOrderDetail($id_cart){
	    global $conn_vn;
		$id_cart = intval($id_cart);
		// Lệnh
		// $sql = "SELECT ca.*, cu.*, orst.* From orderstate orst
        // inner join cart ca
        // inner join account cu
        // on ca.id_account = cu.id_account
        // and ca.id_orderState = orst.id_orderState
        // where ca.id_cart = '".$id_cart."'";
		/*$this->query($sql);
		if($this->num_row() > 0){
			return $this->fetch_one();
		}*/
		$results = mysqli_query($conn_vn, "
		    SELECT * FROM cart WHERE cart.id_cart = $id_cart
		");
		if (mysqli_num_rows($results) > 0) {
		    return mysqli_fetch_assoc($results);
        }
	}

	/**
	 * Lấy Cart detail bằng session_id
	 * @param $session_id
	 *
	 * @return array
	 */
	public function getlistOrderDetail($session_id){
	    global $conn_vn;
		$rows = array();
//		$sql = "SELECT c.*, p.* FROM cartdetail c inner join product p on c.id_product = p.id_product where c.session_id = '".$session_id."'";
//		$this->query($sql);
        $results = mysqli_query($conn_vn ,"
            SELECT c.*, product.* FROM cartdetail AS c
            INNER JOIN product
            ON c.id_product = product.product_id
            WHERE c.session_id = '" . $session_id .  "';
        ");
        while($row = mysqli_fetch_assoc($results)){
            $rows[] = $row;
        }
		return $rows;
	}

	public function getlistOrderDetailByCartId( $id )
	{
		global $conn_vn;
		$rows = array();
//		$sql = "SELECT c.*, p.* FROM cartdetail c inner join product p on c.id_product = p.id_product where c.session_id = '".$session_id."'";
//		$this->query($sql);
		$results = mysqli_query($conn_vn ,"
            SELECT c.*, product.* FROM cartdetail AS c
            INNER JOIN product
            ON c.id_product = product.product_id
            WHERE c.id_cart = $id;
        ");
		while($row = mysqli_fetch_assoc($results)){
			$rows[] = $row;
		}
		return $rows;
	}

    /**
     * Lấy ra trạng thái đơn hàng
     *
     * @date 25/7/2017 Thêm function getOrderState
     * @return array
     */
    public function getOrderState()
    {
        global $conn_vn;
        $rows = array();

        $rs = mysqli_query($conn_vn, "SELECT * FROM order_state");

        while ($row = mysqli_fetch_assoc($rs))
            $rows[] = $row;

        return $rows;
	}

    public function updateOrder(){
        try {
            global $conn_vn;

            if (isset($_POST['id_cart']) && $_POST['id_cart'] != "") {
                $id_cart = $_POST['id_cart'];

                if(isset($_POST['id_orderState'])) $id_orderState = $_POST['id_orderState'];
                if(isset($_POST['note_cart'])) $note_cart = $_POST['note_cart'];
                if(isset($_POST['name_buyer'])) $name_buyer = $_POST['name_buyer'];
                if(isset($_POST['phone_buyer'])) $phone_buyer = $_POST['phone_buyer'];
                if(isset($_POST['address_buyer'])) $address_buyer = $_POST['address_buyer'];
                if(isset($_POST['note_buyer'])) $note_buyer = $_POST['note_buyer'];
                if(isset($_POST['mail_buyer'])) $mail_buyer = $_POST['mail_buyer'];


                /** List qty */
                if(isset($_POST['qyt_product'])) $qyt_product = $_POST['qyt_product'];
                $cart_total_price = 0;

                if (count($qyt_product) > 0)
                {
                    foreach ($qyt_product as $k => $item) {
                        $detail = $this->getCartDetailByDetailID($k);
                        $new_total_price = $detail['price_product'] * $item;
                        $stdetail = $conn_vn->prepare("UPDATE cartdetail SET qyt_product = ?, totalprice_product = ? WHERE id_cartDetail = ?");
                        $stdetail->bind_param('idi', $item, $new_total_price, $k);
                        $stdetail->execute();

                        $cart_total_price += $new_total_price;
                        unset($stdetail);
                    }
                }
                $sql = "UPDATE cart set  
                            note_cart = ?, 
                            id_orderState = ?, 
                            name_buyer = ?,
                            phone_buyer = ?, 
                            address_buyer = ?,
                            note_buyer = ?,
                            mail_buyer = ?,
                            total_price = ? 
                            where id_cart = ?
                ";
                $stmt = $conn_vn->prepare($sql);
                $stmt->bind_param("sisssssdi", $note_cart, $id_orderState, $name_buyer, $phone_buyer, $address_buyer, $note_buyer, $mail_buyer, $cart_total_price, $id_cart);
                $stmt->execute();
                echo json_encode(array(
                    "success"=>"Cập nhật đơn hàng thành công"
                ));
            }
        } catch (Exception $e) {
            echo json_encode(array(
                "error"=>"Lỗi hoặc chưa thay đổi thông tin đơn hàng"
            ));
        }
        exit();
    }

	public function deleteOrder(  ) {

		try {
			$mes = array('url'=>'index.php?page=don-hang');

			$id_cart = isset($_POST['id']) ? $_POST['id'] : null;

			$this->deleteCartByID($id_cart);

			$mes['success'] = 'Bạn xóa đơn hàng thành công';

			echo json_encode($mes);
		} catch (Exception $exception)
		{
			echo json_encode(array(
				'error' => 'Lỗi, vui lòng thử lại sau'
			));
		}
    }

	public function deleteOrderDetail()
	{

		try {
			global $conn_vn;

			$id_cartDetail = isset($_POST['detail_id']) ? $_POST['detail_id'] : null;

			$id_cart = isset($_POST['cart_id']) ? $_POST['cart_id'] : null;

			$detail = $this->getCartDetailByDetailID($id_cartDetail);

			$order = $this->getOrderDetail($id_cart);

			$listsDetail = $this->getlistOrderDetailByCartId($order['id_cart']);
			$mes['count'] = count($listsDetail);

			if (count($listsDetail) > 1)
			{
				$total_price = $order['total_price'] - $detail['totalprice_product'];

				$this->Delete_1('cartdetail', '', array(&$id_cartDetail), array('id_cartDetail'), 'i');

				$this->Update_1('cart',
					array(
						'total_price'
					),
					array(
						&$total_price, &$id_cart
					),
					array('id_cart'),
					'di'
				);
				$mes['status_text'] = 'Cập nhật đơn hàng thành công';

			}
			else
			{
				$this->deleteCartByID($id_cart);
				$mes['status_text'] = 'Bạn đã xóa hết giỏ hàng';
			}

			echo json_encode($mes);
		} catch (Exception $exception)
		{
			echo json_encode([
				'status_debug' => $exception->getMessage(),
				'status_text'     => 'Lỗi, bạn vui lòng thử lại sau'
			]);
		}
		exit();

	}

	public function deleteCartByID( $id )
	{
		global $conn_vn;
		$id_cart = $id;
		$this->Delete_1('cart', '', array(&$id_cart), array('id_cart'), 'i');
		$this->Delete_1('cartdetail', '', array(&$id_cart), array('id_cart'), 'id');
	}

    private function getCartDetailByDetailID($id)
    {
        global $conn_vn;
        $rs = mysqli_query($conn_vn, "
                    SELECT * FROM cartdetail
                    WHERE id_cartDetail = $id
        ");
        return mysqli_fetch_assoc($rs);
    }



}
?>