<!-- Sidebar -->
<aside id="sidebar" class="border-end">
  <nav class="menu mt-5">
    <ul>

      <li class="{{ (request()->is('admin')) ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class=""><i class="bi bi-speedometer"></i> <span>Dashboard</span> </a>
      </li>

      <li data-bs-toggle="collapse" data-bs-target="#demo">
       
        <a href="#" class="d-flex justify-content-between" >
          <div class=""><i class="bi bi-box-seam"></i> <span>{{ __('Catalog') }}</span></div>
          <i class="bi bi-chevron-down"></i>
        </a>

        <ul class="sub-menu collapse" id="demo">
          <li>
            <a href="{{ route('products.index') }}">
              <i class="bi bi-dash"></i> 
              <span>{{ __('Products') }}</span>
            </a>
          </li>
          <li>
            <a href="{{ route('categories.index') }}">
              <i class="bi bi-dash"></i> 
              <span>{{ __('Categories') }}</span>
            </a>
          </li>
          <li>
            <a href="{{ route('brands.index') }}">
              <i class="bi bi-dash"></i> 
              <span>{{ __('Brands') }}</span>
            </a>
          </li>
          <li>
            <a href="{{ route('tags.index') }}">
              <i class="bi bi-dash"></i> 
              <span>{{ __('Tags') }}</span>
            </a>
          </li>
        </ul>

      </li>

      <li class="{{ (request()->is('admin/users')) ? 'active' : '' }}">
        <a href="{{ route('users.index') }}">
          <i class="bi bi-people"></i> 
          <span>{{ __('Users') }}</span> 
        </a>
      </li>

    </ul>
  </nav>
</aside><!-- /Sidebar -->