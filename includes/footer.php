<script>
    function addToWishlist(productId, redirect = 'index.php') {
        // Create a new FormData object
        var formData = new FormData();
        formData.append('product_id', productId);
        formData.append('redirect', redirect);

        // Use Fetch API to send the POST request
        fetch('add_to_wishlist.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => console.log(data))
            .catch((error) => {
                console.error('Error:', error);
            }).finally(() => {
                location.href = redirect;
            });
    }
</script>

<script src="/assets/js/index.js"></script>
</body>

</html>