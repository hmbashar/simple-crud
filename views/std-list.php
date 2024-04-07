<?php 

global $wpdb;

// $students = $wpdb->get_results(
//     $wpdb->prepare( "SELECT * FROM wp_croud_tbl", "" ), ARRAY_A
// );


$students = $wpdb->get_results( "SELECT * FROM wp_croud_tbl", ARRAY_A );

$action = isset($_GET['action']) ? trim($_GET['action']) : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : '';


if(!empty($action) && $action == 'delete' && $id > 0) {
    //$wpdb->query( $wpdb->prepare( "DELETE FROM wp_croud_tbl WHERE id = %d", $id ) );

    //$row = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM wp_croud_tbl WHERE id = %d", $id ) );

    
    $wpdb->delete( 'wp_croud_tbl', array( 'id' => $id ) );    
    
    echo '<script> location.href="admin.php?page=simple-crud"; </script>';
    
}

?>


<table border="1">
    <tr>
        <th>SL No.</th>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>

    <?php $i = 1; foreach($students as $student) { ?>
        <tr>
            <td> <?php echo $i++ ?> </td>
            <td> <?php echo $student['id'] ?> </td>
            <td> <?php echo $student['name'] ?> </td>
            <td> <?php echo $student['email'] ?> </td>
            <td>
                <a href="admin.php?page=simple-student-added&action=edit&id=<?php echo $student['id'] ?> ">Edit</a>
                <a href="admin.php?page=simple-crud&action=delete&id=<?php echo $student['id'] ?> ">Delete</a>
            </td>
        </tr>
    <?php } ?>
    
</table>