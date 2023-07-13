import './bootstrap';


document.getElementById('search-name').addEventListener('input', fetchProducts);
document.getElementById('search-price').addEventListener('input', fetchProducts);
document.getElementById('search-cat').addEventListener('change', fetchProducts);

function fetchProducts() {
  const query_string = createQueryString();

  $.ajax({
    url: `/api/products?${query_string}`,
    method: 'GET',
    dataType: 'xml',
    success: function (responseXml) {
      const products = parseXMLProducts(responseXml);
      refreshTable(products);
    },
    error: function (xhr, status, error) {
      console.log(error);
    }
  });
}

function parseXMLProducts(responseXml) {
    const products = [];
    const productNodes = responseXml.getElementsByTagName('product');
  
    for (let i = 0; i < productNodes.length; i++) {
      const productNode = productNodes[i];
      const name = productNode.getElementsByTagName('name')[0].textContent;
      const price = productNode.getElementsByTagName('price')[0].textContent;
      const category = productNode.getElementsByTagName('category')[0].textContent;
  
      const product = { name, price, category };
      products.push(product);
    }
  
    return products;
  }

function createQueryString() {
  let queryString = '';

  const search_name_val = document.getElementById('search-name').value;
  const search_price_val = document.getElementById('search-price').value;
  const search_cat_val = document.getElementById('search-cat').value;

  search_name_val ? (queryString ? queryString += `&name=${search_name_val}` : queryString += `name=${search_name_val}`) : '';
  search_price_val ? (queryString ? queryString += `&price=${search_price_val}` : queryString += `price=${search_price_val}`) : '';
  search_cat_val ? (queryString ? queryString += `&category=${search_cat_val}` : queryString += `category=${search_cat_val}`) : '';

  return queryString;
}

function refreshTable(products) {
  const tbody = document.getElementById('product-body');
  tbody.innerHTML = '';

  products.forEach((product) => {
    const row = document.createElement("tr");

    const name_td = document.createElement('td');
    const a_href = document.createElement('a');

    a_href.href = `/products/${product.id}`;
    a_href.className = "text-blue-500 hover:text-blue-700";
    a_href.innerHTML = product.name;

    name_td.className = "border px-4 py-2";
    name_td.appendChild(a_href);

    const price_td = document.createElement('td');
    price_td.className = "border px-4 py-2";

    const price_div = document.createElement('div');
    price_div.className = "flex justify-between";

    const php_span = document.createElement('div');
    php_span.innerHTML = 'Php';
    const price_span = document.createElement('div');
    price_span.innerHTML = product.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    price_div.appendChild(php_span);
    price_div.appendChild(price_span);
    price_td.appendChild(price_div);

    const cat_td = document.createElement('td');
    cat_td.className = "border px-4 py-2 text-center";
    cat_td.innerHTML = product.category;

    row.appendChild(name_td);
    row.appendChild(price_td);
    row.appendChild(cat_td);
    tbody.appendChild(row);

    console.log(product);
  });
}

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


