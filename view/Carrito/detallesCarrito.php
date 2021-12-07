
<?php 
    while ($car = mysqli_fetch_assoc($productos)) {
?>  
    <div class="alternarBackground px-2 py-1 d-flex">
        <div class="d-inline-block" style="width:3rem;">
            <img class="size-productos" style="width:3rem;height:3rem" src="<?php echo $car['Pro_Imagen']; ?>" alt="<?php echo $car['Pro_Nombre']; ?>" >
        </div> 
        <div class="pl-2 d-inline-block" style="width: 68%">
            <?php echo $car['Pro_Nombre']; ?>
        </div>
    </div>
<?php
    }
?>