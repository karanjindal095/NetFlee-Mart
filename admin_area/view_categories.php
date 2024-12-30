<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>Sr No.</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
            $select_cat="SELECT * FROM `categories`";
            $result=mysqli_query($conn,$select_cat);
            $num=0;

            while ($row=mysqli_fetch_assoc($result)) {
                $category_id=$row['category_id'];
                $category_title=$row['category_title'];
                $num++;
                echo "
                    <tr class='text-center'>
                        <td>$num</td>
                        <td>$category_title</td>
                        <td><a href='index.php?edit_category=$category_id' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                        <td><a href='index.php?delete_category=$category_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                    </tr>
                ";
            }

        ?>
    </tbody>
</table>