<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<link rel="stylesheet" href="{{BASE_URL}}/assets/style/global.css" />
<script src="{{BASE_URL}}/assets/js/axios.min.js"></script>
<input type="checkbox" id="check">
<label for="check" class="menu-trigger" id="menu-trigger">
	<div></div>
	<div></div>
	<div></div>
</label>
<div class="header">
  <span class="logo">{{PAGE_NAME}}</span>
</div>
<div class="barra">
	<nav>

    <h3 align="center">Tags</h3>
	<a href="{{BASE_URL}}taghome">
		<div class="link">Listagem</div>
	</a>
	<a href="{{BASE_URL}}tagregister">
		<div class="link">Cadastro</div>
	</a>

    <h3 align="center">Produtos</h3>
	<a href="{{BASE_URL}}producthome">
		<div class="link">Listagem</div>
	</a>
	<a href="{{BASE_URL}}productregister">
		<div class="link">Cadastro</div>
	</a>
	<a href="{{BASE_URL}}productreport">
		<div class="link">Relatório de relevância</div>
	</a>
	</nav>
</div>