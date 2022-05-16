<?php
    //Uploaden bestanden
    if(isset($_FILES['my_file']) && $_FILES['my_file']['size'] > 0) {
        $tmp_file = $_FILES['my_file']['tmp_name'];
        $file_name = $_FILES['my_file']['name'];

        move_uploaded_file($tmp_file, BASE_URL . 'views/uploads/' . $file_name);
        print_r(mime_content_type(BASE_URL . 'views/uploads/' . $file_name));
    }
    $items = scandir(BASE_URL . 'views/uploads/');
    
    //Create auction
    if( isset($_POST['create'])) {
        global $db;

        $horse = new Horse();
        
        // For validation form and db
        $valid = true;

        $horse->name = trim( $_POST['name']);
        $horse->age = trim( $_POST['age']);
        $horse->mother = trim( $_POST['mother']);
        $horse->father = trim( $_POST['father']);
        $horse->color = trim( $_POST['color']);
        $horse->discipline = trim( $_POST['discipline']);
        $horse->gender = trim( $_POST['gender']);
        $horse->description = trim( $_POST['description']);
        $horse->pedigree = trim( $_POST['pedigree']);
        $horse->height = trim( $_POST['height']);
        $horse->owner = trim( $_POST['owner']);

        /* if( empty($user->firstname) || empty($user->lastname) || empty($user->email) || empty($user->pwd)) {
            $valid = false;
        } */

        if ($valid) {
           $horse->createHorse($horse);
        }  
    }    
?>
<div class="apply-container h-layout">
    <h1>Do you also want a horse in our auction? Apply here</h1>
    
    <form method="POST">
        <label>
            <span>Name</span>
            <input type="text" name="name" maxlenght="128" placeholder="Odelie"
            value="<?php echo $horse->name ?? ''; ?>" required>
        </label>

        <label>
            <span>Age</span>
            <input type="text" name="age" maxlenght="128" placeholder="10"
            value="<?php echo $horse->age ?? ''; ?>" required>
        </label>

        <label>
            <span>Mother</span>
            <input type="text" name="mother" maxlenght="128" placeholder="Name of mother"
            value="<?php echo $horse->mother ?? ''; ?>" required>
        </label>

        <label>
            <span>Father</span>
            <input type="text" name="father" maxlenght="128" placeholder="Name of father"
            value="<?php echo $horse->father ?? ''; ?>" required>
        </label>

        <label>
            <span>color</span>
            <input type="text" name="color" maxlenght="128" placeholder="Brown"
            value="<?php echo $horse->color ?? ''; ?>" required>
        </label>

        <label>
            <span>Discipline</span>
            <input type="text" name="discipline" maxlenght="128" placeholder="Jumping"
            value="<?php echo $horse->discipline ?? ''; ?>" required>
        </label>

        <label>
            <span>Gender</span>
            <select name="gender">
                <option value="">Select...</option>
                <option value="stallion">Stallion</option>
                <option value="gelding">Gelding</option>
                <option value="mare">Mare</option>
            </select>
        </label>

        <label>
            <span>Description</span>
            <textarea name="description" rows="4" cols="50">
            Tell me something about your horse.
            </textarea>        
        </label>

        <label>
            <span>Pedigree</span>
            <input type="text" name="pedigree" maxlenght="128" placeholder="father x father of mother"
            value="<?php echo $horse->pedigree ?? ''; ?>" required>
        </label>

        <label>
            <span>Height</span>
            <input type="text" name="height" maxlenght="16" placeholder="165"
            value="<?php echo $horse->height ?? ''; ?>" required>
        </label>

        <label>
            <span>Owner</span>
            <input type="text" name="owner" maxlenght="128" placeholder="QR Stables"
            value="<?php echo $horse->owner ?? ''; ?>" required>
        </label>

        <button type="submit" class="secondary-btn" name="create">Apply</button>
    </form>

    <h3>Upload here a picture or pdf of the passport of the horse.</h3>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="my_file">
        <button type="submit" class="secondary-btn">upload</button>
    </form>

    <h3>You made a mistake? no problem! You can update here.</h3>
    <form method="POST">
        <label>
            <span>Select which auction you want to update</span>
            <select name="selected">
                <?php 
                    foreach($auctions as $item) {
                        include 'views/partials/option.php';
                    }
                ?>
            </select>
        </label>

        <label>
            <span>Name</span>
            <input type="text" name="name" maxlenght="128" placeholder="Odelie"
            value="<?php echo $horse->name ?? ''; ?>" required>
        </label>

        <label>
            <span>Age</span>
            <input type="text" name="age" maxlenght="128" placeholder="10"
            value="<?php echo $horse->age ?? ''; ?>" required>
        </label>

        <label>
            <span>Mother</span>
            <input type="text" name="mother" maxlenght="128" placeholder="Name of mother"
            value="<?php echo $horse->mother ?? ''; ?>" required>
        </label>

        <label>
            <span>Father</span>
            <input type="text" name="father" maxlenght="128" placeholder="Name of father"
            value="<?php echo $horse->father ?? ''; ?>" required>
        </label>

        <label>
            <span>color</span>
            <input type="text" name="color" maxlenght="128" placeholder="Brown"
            value="<?php echo $horse->color ?? ''; ?>" required>
        </label>

        <label>
            <span>Discipline</span>
            <input type="text" name="discipline" maxlenght="128" placeholder="Jumping"
            value="<?php echo $horse->discipline ?? ''; ?>" required>
        </label>

        <label>
            <span>Gender</span>
            <select name="gender">
                <option value="">Select...</option>
                <option value="stallion">Stallion</option>
                <option value="gelding">Gelding</option>
                <option value="mare">Mare</option>
            </select>
        </label>

        <label>
            <span>Description</span>
            <textarea name="description" rows="4" cols="50">
            Tell me something about your horse.
            </textarea>        
        </label>

        <label>
            <span>Pedigree</span>
            <input type="text" name="pedigree" maxlenght="128" placeholder="father x father of mother"
            value="<?php echo $horse->pedigree ?? ''; ?>" required>
        </label>

        <label>
            <span>Height</span>
            <input type="text" name="height" maxlenght="16" placeholder="165"
            value="<?php echo $horse->height ?? ''; ?>" required>
        </label>

        <label>
            <span>Owner</span>
            <input type="text" name="owner" maxlenght="128" placeholder="QR Stables"
            value="<?php echo $horse->owner ?? ''; ?>" required>
        </label>

        <button type="submit" class="secondary-btn" name="update-horse">Update</button>
    </form>

    <h3>Delete a horse</h3>
    <form method="POST">
        <label>
            <span>Select which auction you want to delete</span>
            <select name="selected">
                <?php 
                    foreach($auctions as $item) {
                        include 'views/partials/option.php';
                    }
                ?>
            </select>
        </label>
        <button type="submit" class="secondary-btn" name="delete-horse">Delete</button>
    </form>
    
</div>

