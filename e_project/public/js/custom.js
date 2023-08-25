

function addProduct(id) {
    console.log(id);

    saveProduct(id);
}

function saveProduct(productId) {
    // Thực hiện Ajax POST request hoặc xử lý dữ liệu theo nhu cầu của bạn
    $.ajax({
      url: '/save-product',
      type: 'POST',
      data: {
        productId: productId
      },
      success: function(response) {
        // Xử lý phản hồi thành công từ server
        console.log(response);
      },
      error: function(xhr) {
        // Xử lý lỗi
        console.log(xhr.responseText);
      }
    });
  }