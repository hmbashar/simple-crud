<?php 

    global $wpdb;

    $message = "";
    $action = isset($_GET['action']) ? trim($_GET['action']) : '';
    $id = isset($_GET['id']) ? intval($_GET['id']) : '';

    $rows = $wpdb->get_row(
        $wpdb->prepare( "SELECT * FROM wp_croud_tbl where id = %d", "$id" ), ARRAY_A
    );

    if(isset($_POST['btnsubmit'])) {
        $action = isset($_GET['action']) ? trim($_GET['action']) : '';
        $id = isset($_GET['id']) ? intval($_GET['id']) : '';

        if(!empty($action) && $action == 'edit') {
            $wpdb->update("wp_croud_tbl", array(
                "name" => $_POST['name'], 
                "email" => $_POST['email']), 
                array("id" => $id)
            );

            $message = "Data Updated Successfully";

            echo "<script>window.location = 'admin.php?page=simple-crud';</script>";
           
        }else {
            $wpdb->insert("wp_croud_tbl", array(
                "name" => $_POST['name'], 
                "email" => $_POST['email'])
            );
    
            if($wpdb->insert_id > 0) {
                $message = "Data Saved Successfully";
            }else {
                $message = "Data Not Saved";
            }
        }
        
    }
?>


<p><?php echo $message; ?></p>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=simple-student-added<?php if(!empty($action)) { echo '&action=edit&id='.$id; } ?>" method="POST">
    <p>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Name" value="<?php echo isset($rows['name']) ? $rows['name'] : '' ?>">
    </p>
    <p>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email" value="<?php echo isset($rows['email']) ? $rows['email'] : '' ?>">
    </p>
    <p>
        <button name="btnsubmit">Submit</button>
    </p>
</form>