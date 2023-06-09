<!DOCTYPE html>
<html>
<head>
  <title>Pizza Order Form</title>
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>
  <div class="container">
    <div class="logo">
      <img src="download.png" alt="Pizza Logo">
    </div>
    <h1>Pizza Order Form</h1>

    <?php
    $size = $toppings = $name = $email = $phone = $address = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $size = $_POST['size'];
      $toppings = isset($_POST['toppings']) ? $_POST['toppings'] : [];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
    }
    ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <label for="size">Pizza Size:</label>
      <select id="size" name="size" required>
        <option value="small" <?php if ($size == 'small') echo 'selected'; ?>>Small</option>
        <option value="medium" <?php if ($size == 'medium') echo 'selected'; ?>>Medium</option>
        <option value="large" <?php if ($size == 'large') echo 'selected'; ?>>Large</option>
      </select>

      <label for="toppings">Toppings:</label>
      <input type="checkbox" id="pepperoni" name="toppings[]" value="pepperoni" <?php if (in_array('pepperoni', $toppings)) echo 'checked'; ?>>
      <label for="pepperoni">Pepperoni</label>
      <input type="checkbox" id="mushrooms" name="toppings[]" value="mushrooms" <?php if (in_array('mushrooms', $toppings)) echo 'checked'; ?>>
      <label for="mushrooms">Mushrooms</label>
      <input type="checkbox" id="onions" name="toppings[]" value="onions" <?php if (in_array('onions', $toppings)) echo 'checked'; ?>>
      <label for="onions">Onions</label>
      <input type="checkbox" id="sausage" name="toppings[]" value="sausage" <?php if (in_array('sausage', $toppings)) echo 'checked'; ?>>
      <label for="sausage">Sausage</label>
      <input type="checkbox" id="peppers" name="toppings[]" value="peppers" <?php if (in_array('peppers', $toppings)) echo 'checked'; ?>>
      <label for="peppers">Peppers</label>
      <input type="checkbox" id="olives" name="toppings[]" value="olives" <?php if (in_array('olives', $toppings)) echo 'checked'; ?>>
      <label for="olives">Olives</label>

      <label for="name">Name:</label>
      <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

      <label for="phone">Phone:</label>
      <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>" required>

      <label for="address">Address:</label>
      <textarea id="address" name="address" required><?php echo $address; ?></textarea>

      <input type="submit" value="Place Order">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      echo "<h2>Order Details:</h2>";
      echo "<p><strong>Size:</strong> $size</p>";

      if (!empty($toppings)) {
        echo "<p><strong>Toppings:</strong></p>";
        echo "<ul>";
        foreach ($toppings as $topping) {
          echo "<li>$topping</li>";
        }
        echo "</ul>";
      }

      echo "<p><strong>Name:</strong> $name</p>";
      echo "<p><strong>Email:</strong> $email</p>";
      echo "<p><strong>Phone:</strong> $phone</p>";
      echo "<p><strong>Address:</strong> $address</p>";
    }
    ?>
  </div>
</body>
</html>