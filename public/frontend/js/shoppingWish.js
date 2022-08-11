// ***************************************************
// Shopping Cart functions

var shoppingWish = (function () {
    // Private methods and properties
    var wish = [];

    function Item(product_id) {
        this.product_id = product_id
    }

    function saveWish() {
        localStorage.setItem("shoppingWish", JSON.stringify(wish));
    }

    function loadWish() {
        wish = JSON.parse(localStorage.getItem("shoppingWish"));
        if (wish === null) {
            wish = []
        }
    }

    loadWish();



    // Public methods and properties
    var obj = {};

    obj.addItemToWish = function (product_id) {
        for (var i in wish) {
            if (wish[i].product_id === product_id) {
                // cart[i].qty += qty;
                // saveCart();
                return;
            }
        }


        console.log("addItemToWish:", product_id);   
        var item = new Item(product_id);
        wish.push(item);
        saveWish();

    };

    obj.setCountForItem = function (name, count) {
        for (var i in cart) {
            if (cart[i].name === name) {
                cart[i].count = count;
                break;
            }
        }
        saveCart();
    };


    obj.removeItemFromCart = function (name) { // Removes one item
        for (var i in cart) {
            if (cart[i].name === name) { // "3" === 3 false
                cart[i].count--; // cart[i].count --
                if (cart[i].count === 0) {
                    cart.splice(i, 1);
                }
                break;
            }
        }
        saveCart();
    };


    obj.removeItemFromCartAll = function (name) { // removes all item name
        for (var i in cart) {
            if (cart[i].name === name) {
                cart.splice(i, 1);
                break;
            }
        }
        saveCart();

    };


    obj.clearCart = function () {
        cart = [];
        saveCart();
    }


    obj.countWish = function () { // -> return total count

        return wish.length;
    };


    obj.totalCart = function () { // -> return total cost
        var totalCost = 0;
        for (var i in cart) {
            totalCost += cart[i].price * cart[i].count;
        }
        return totalCost.toFixed(2);
    };

    obj.listWish = function () { // -> array of Items
        var wishCopy = [];
        console.log("Listing Wish");
        console.log(wish);
        for (var i in wish) {
            console.log(i);
            var item = wish[i];
            var itemCopy = {};
            for (var p in item) {
                itemCopy[p] = item[p];
            }
            //itemCopy.total = (item.price * item.count).toFixed(2);
            wishCopy.push(itemCopy);
        }
        return wishCopy;
    };

    // ----------------------------
    return obj;
})();




