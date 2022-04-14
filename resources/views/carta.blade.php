@extends('layouts.base')

@section('title', 'Kinari - Sushi Bar')

@section('idBody', 'carta')

@section('header')
    <header>
        @include('elements.navbar')
    </header>
@endsection

@section('content')
    <section>
        <div id="menu" class="container m-bottom-3 middle align-middle">
            <div class="m-bottom-3 row middle align-items-center">
                <div class="col-auto me-auto">
                    <button type="button" class="btn btn-outline-light">
                        <img src="/img/promo.png" alt="" width="50" class="d-inline-block align-text-center">
                        Promociones
                    </button>
                </div>
                <div class="col-auto me-auto">
                    <button type="button" class="btn btn-outline-light">
                        <img src="/img/sushi.png" alt="" width="50" class="d-inline-block align-text-center">
                        Sushi
                    </button>   
                </div>
                <div class="col-auto me-auto">
                    <button type="button" class="btn btn-outline-light">
                        <img src="/img/bebida.png" alt="" width="50" class="d-inline-block align-text-center">
                        Bebidas
                    </button>  
                </div>
                <div class="col-auto me-auto">
                    <button type="button" class="btn btn-outline-light">
                        <img src="/img/salsa.png" alt="" width="40" class="d-inline-block align-text-center">
                        Salsas
                    </button>  
                </div>
            </div>
        </div>
        <div id="productos" class="container m-bottom-3">
          <div id="Promo" class="row middle section-tittle align-items-center">
            <div class="col-auto me-auto"><h2>Promociones</h2></div>
            <div class="col"><hr class="rounded"></div>
          </div>
          <div id="secciones" class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card h-100">
                <img class="estilo-img" src="/img/promo1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Kinari Promo</h5>
                  <p class="card-text">Osmanthus wine tastes the same as I remember... But where are those who share the memory?</p>
                  <div class="row align-items-center">
                    <div class="col-4">
                      <button type="button" class="btn btn-outline-danger"><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/40/000000/external-add-cart-ecommerce-flatart-icons-outline-flatarticons.png"/></button>
                    </div>
                    <div class="col-6"><h6 id="Precio">$123.456</h6></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img class="estilo-img" src="/img/promo2.jpg" class="card-img-top-center">
                <div class="card-body">
                  <h5 class="card-title">Promo 60 Piezas</h5>
                  <p class="card-text">My family must be able to see it too. I hope my siblings are well... And I hope that they have turned out to be formidable warriors too.</p>
                  <div class="row align-items-center">
                    <div class="col-4">
                      <button type="button" class="btn btn-outline-danger"><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/40/000000/external-add-cart-ecommerce-flatart-icons-outline-flatarticons.png"/></button>
                    </div>
                    <div class="col-6"><h6 id="Precio">$123.456</h6></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="Sushi" class="row middle section-tittle align-items-center">
            <div class="col-auto me-auto"><h2>Sushi</h2></div>
            <div class="col"><hr class="rounded"></div>
          </div>
          <div id="secciones" class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card h-100">
                <img class="estilo-img" src="/img/promo1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Tori Roll</h5>
                  <p class="card-text">Osmanthus wine tastes the same as I remember... But where are those who share the memory?</p>
                  <div class="row align-items-center">
                    <div class="col-4">
                      <button type="button" class="btn btn-outline-danger"><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/40/000000/external-add-cart-ecommerce-flatart-icons-outline-flatarticons.png"/></button>
                    </div>
                    <div class="col-6"><h6 id="Precio">$123.456</h6></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img class="estilo-img" src="/img/promo2.jpg" class="card-img-top-center">
                <div class="card-body">
                  <h5 class="card-title">Ebi Roll</h5>
                  <p class="card-text">My family must be able to see it too. I hope my siblings are well... And I hope that they have turned out to be formidable warriors too.</p>
                  <div class="row align-items-center">
                    <div class="col-4">
                      <button type="button" class="btn btn-outline-danger"><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/40/000000/external-add-cart-ecommerce-flatart-icons-outline-flatarticons.png"/></button>
                    </div>
                    <div class="col-6"><h6 id="Precio">$123.456</h6></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img class="estilo-img" src="/img/promo2.jpg" class="card-img-top-center">
                <div class="card-body">
                  <h5 class="card-title">Sake Roll</h5>
                  <p class="card-text">Pff, real men don't carry umbrellas... Oh boy, wow, it's really starting to pick up. Uh quick, c'mon, get yours out! C'mon, quick, quick, quick!</p>
                  <div class="row align-items-center">
                    <div class="col-4">
                      <button type="button" class="btn btn-outline-danger"><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/40/000000/external-add-cart-ecommerce-flatart-icons-outline-flatarticons.png"/></button>
                    </div>
                    <div class="col-6"><h6 id="Precio">$123.456</h6></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="Bebidas" class="row middle section-tittle align-items-center">
            <div class="col-auto me-auto"><h2>Bebidas</h2></div>
            <div class="col"><hr class="rounded"></div>
          </div>
          <div id="secciones" class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card h-100">
                <img class="estilo-img" src="/img/cocacola.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Coca-Cola</h5>
                  <p class="card-text">Osmanthus wine tastes the same as I remember... But where are those who share the memory?</p>
                  <div class="row align-items-center">
                    <div class="col-4">
                      <button type="button" class="btn btn-outline-danger"><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/40/000000/external-add-cart-ecommerce-flatart-icons-outline-flatarticons.png"/></button>
                    </div>
                    <div class="col-6"><h6 id="Precio">$500</h6></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img class="estilo-img" src="/img/fanta.jpg" class="card-img-top-center">
                <div class="card-body">
                  <h5 class="card-title">Fanta</h5>
                  <p class="card-text">My family must be able to see it too. I hope my siblings are well... And I hope that they have turned out to be formidable warriors too.</p>
                  <div class="row align-items-center">
                    <div class="col-4">
                      <button type="button" class="btn btn-outline-danger"><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/40/000000/external-add-cart-ecommerce-flatart-icons-outline-flatarticons.png"/></button>
                    </div>
                    <div class="col-6"><h6 id="Precio">$500</h6></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img class="estilo-img" src="/img/sprite.png" class="card-img-top-center">
                <div class="card-body">
                  <h5 class="card-title">Sprite</h5>
                  <p class="card-text">Pff, real men don't carry umbrellas... Oh boy, wow, it's really starting to pick up. Uh quick, c'mon, get yours out! C'mon, quick, quick, quick!</p>
                  <div class="row align-items-center">
                    <div class="col-4">
                      <button type="button" class="btn btn-outline-danger"><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/40/000000/external-add-cart-ecommerce-flatart-icons-outline-flatarticons.png"/></button>
                    </div>
                    <div class="col-6"><h6 id="Precio">$500</h6></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="Salsas" class="row middle section-tittle align-items-center">
            <div class="col-auto me-auto"><h2>Salsas</h2></div>
            <div class="col"><hr class="rounded"></div>
          </div>
          <div id="secciones" class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card h-100">
                <img class="estilo-img" src="/img/soya.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Soya Tradicional</h5>
                  <p class="card-text">Osmanthus wine tastes the same as I remember... But where are those who share the memory?</p>
                  <div class="row align-items-center">
                    <div class="col-4">
                      <button type="button" class="btn btn-outline-danger"><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/40/000000/external-add-cart-ecommerce-flatart-icons-outline-flatarticons.png"/></button>
                    </div>
                    <div class="col-6"><h6 id="Precio">$500</h6></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img class="estilo-img" src="/img/teriyaki.jpg" class="card-img-top-center">
                <div class="card-body">
                  <h5 class="card-title">Teriyaki Tradicional</h5>
                  <p class="card-text">My family must be able to see it too. I hope my siblings are well... And I hope that they have turned out to be formidable warriors too.</p>
                  <div class="row align-items-center">
                    <div class="col-4">
                      <button type="button" class="btn btn-outline-danger"><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/40/000000/external-add-cart-ecommerce-flatart-icons-outline-flatarticons.png"/></button>
                    </div>
                    <div class="col-6"><h6 id="Precio">$500</h6></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img class="estilo-img" src="/img/wasabi.jpg" class="card-img-top-center">
                <div class="card-body">
                  <h5 class="card-title">Wasabi Adicional</h5>
                  <p class="card-text">Pff, real men don't carry umbrellas... Oh boy, wow, it's really starting to pick up. Uh quick, c'mon, get yours out! C'mon, quick, quick, quick!</p>
                  <div class="row align-items-center">
                    <div class="col-4">
                      <button type="button" class="btn btn-outline-danger"><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/40/000000/external-add-cart-ecommerce-flatart-icons-outline-flatarticons.png"/></button>
                    </div>
                    <div class="col-6"><h6 id="Precio">$500</h6></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          
    </section>

@endsection

@section('footer')
    @include('elements.footer')
@endsection