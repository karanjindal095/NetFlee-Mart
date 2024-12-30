<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>Sr No.</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
            $select_cat="SELECT * FROM `brand`";
            $result=mysqli_query($conn,$select_cat);
            $num=0;

            while ($row=mysqli_fetch_assoc($result)) {
                $brand_id=$row['brand_id'];
                $brand_title=$row['brand_title'];
                $num++;
                echo "
                    <tr class='text-center'>
                        <td>$num</td>
                        <td>$brand_title</td>
                        <td><a href='index.php?edit_brand=$brand_id' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                        <td><a href='index.php?delete_brand=$brand_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                    </tr>
                ";
            }

        ?>
    </tbody>
</table>