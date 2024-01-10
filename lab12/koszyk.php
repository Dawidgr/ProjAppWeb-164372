<?php
include('cfg.php');
session_start();

class ShoppingCart
{
    public function addToCart($product_id, $quantity)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $quantity = ($quantity !== '') ? $quantity : 1;

        $productKey = 'product_' . $product_id;
        if (isset($_SESSION['cart'][$productKey])) {
            $_SESSION['cart'][$productKey]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$productKey] = array(
                'id' => $product_id,
                'quantity' => $quantity,
            );
        }
    }

    public function removeFromCart($product_id)
    {
        $productKey = 'product_' . $product_id;
        unset($_SESSION['cart'][$productKey]);
    }

    public function updateQuantity($product_id, $quantity)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (!empty($quantity) && is_numeric($quantity)) {
            $productKey = 'product_' . $product_id;
            if (isset($_SESSION['cart'][$productKey])) {
                $_SESSION['cart'][$productKey]['quantity'] = $quantity;
            }
        }
    }

    public function showCart()
    {
        $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

        if (!empty($cartItems)) {
            echo '<h2>Zawartość koszyka:</h2>';
            echo '<table border="1">
                    <tr>
                        <th>Tytuł</th>
                        <th>Ilość</th>
                        <th>Cena jednostkowa</th>
                        <th>Łączna cena</th>
                        <th>Akcje</th>
                    </tr>';
            foreach ($cartItems as $item) {
                $productInfo = $this->getProductInfo($item['id']);
				$cena = round($productInfo['cena'], 2);
				$suma = round($item['quantity'] * $cena, 2);
                echo '<tr>
                        <td>' . $productInfo['tytul'] . '</td>
                        <td>' . $item['quantity'] . '</td>
                        <td>' . $cena . ' zł</td>
                        <td>' . $suma . ' zł</td>
                        <td>
                            <form method="post" style="display: inline;">
                                <input type="hidden" name="action" value="koszyk_usun">
                                <input type="hidden" name="id" value="' . $item['id'] . '">
                                <button type="submit">Usuń</button>
                            </form>
                            <form method="post" style="display: inline;">
                                <input type="hidden" name="action" value="koszyk_edytuj">
                                <input type="hidden" name="id" value="' . $item['id'] . '">
                                <input type="number" name="ilosc" min="1" value="' . $item['quantity'] . '"> szt.
                                <button type="submit">Zmień ilość</button>
                            </form>
                        </td>
                      </tr>';
            }
            echo '</table><br />';
        } else {
            echo '<h2>Koszyk jest pusty.</h2>';
        }
    }

    private function getProductInfo($product_id)
    {
        global $conn;
        $query = "SELECT * FROM produkty WHERE id = $product_id";

        if ($result = $conn->query($query)) {
            $row = $result->fetch_assoc();

            if ($row) {
                return array(
                    'tytul' => $row['tytul'],
                    'cena' => $row['cena_netto'] * (1 + $row['podatek_vat'])
                );
            }
        }

        return array();
    }
}

function PokazProdukty()
{
    global $conn;
    $query = "SELECT * FROM produkty LIMIT 100";

    if ($result = $conn->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $cena = $row['cena_netto'] * (1 + $row['podatek_vat']);
            $cena = round($cena, 2);
            echo '<div>
                    <span>Tytuł: ' . $row['tytul'] . '</span><br>
                    <span>Opis: ' . $row['opis'] . '</span><br>
                    <span>Gabaryt produktu: ' . $row['gabaryt_produktu'] . '</span><br>
                    <img src="' . $row['zdjecie'] . '" alt="Zdjecie produktu ' . $row['tytul'] . '" style="width:128px;height:128px;"><br>
                    <span>Cena: ' . $cena . ' zł</span><br>
                    <span>Ilość dostępnych sztuk: ' . $row['ilosc_dostepnych_sztuk'] . '</span><br>
                    <form method="post" style="display: inline;">
                        <input type="hidden" name="action" value="koszyk_dodaj">
                        <input type="hidden" name="id" value="' . $row['id'] . '">
                        <input type="number" name="ilosc" min="1" max="' . $row['ilosc_dostepnych_sztuk'] . '"> szt.
                        <button type="submit">Dodaj do koszyka</button>
                    </form>
                  </div><br>';
        }
    }
}

$Cart = new ShoppingCart();

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'koszyk_dodaj':
            $product_id = $_POST['id'];
            $quantity = $_POST['ilosc'];
            $Cart->addToCart($product_id, $quantity);
            break;
        case 'koszyk_usun':
            $product_id = $_POST['id'];
            $Cart->removeFromCart($product_id);
            break;
        case 'koszyk_edytuj':
            $product_id = $_POST['id'];
            $quantity = $_POST['ilosc'];
            $Cart->updateQuantity($product_id, $quantity);
            break;
    }
}
$Cart->showCart();
PokazProdukty();
?>
