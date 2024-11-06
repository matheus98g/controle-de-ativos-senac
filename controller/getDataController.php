<?php
function get_data(
    $db,
    $table,
    $where_column = false,
    $where_value = false
) {
    $sql = "SELECT * FROM " . $table;

    if ($where_column != false) {
        $sql .= " where $where_column = '" . $where_value . "' ";
    }
    $result = mysqli_query($db, $sql) or die(false);
    $dados = $result->fetch_all(MYSQLI_ASSOC);
    return $dados;
};
