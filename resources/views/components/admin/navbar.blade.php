<!-- Sidebar -->
<aside id="sidebar" class="border-end">
   <nav class="menu">
      <ul>
         <li class="{{ (request()->is('admin')) ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class=""><i class="bi bi-speedometer"></i> <span>Dashboard</span> </a>
         </li>
         <li class="{{ (request()->is('admin/catalog/*')) ? 'active' : '' }}" class="accordion" id="accordionExample">
            <div class="accordion-item">
               <a href="javascript:void(0);" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
               <i class="bi bi-box-seam"></i> <span>{{ __('Catalog') }}</span>
               </a>
               <ul id="collapseOne" class="sub-menu accordion-collapse collapse {{ (request()->is('admin/catalog/*')) ? 'show' : '' }}" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                     <li class="{{ (request()->is('admin/catalog/products*')) ? 'active' : '' }}">
                        <a href="{{ route('products.index') }}">
                        <i class="bi bi-dash"></i> 
                        <span>{{ __('Products') }}</span>
                        </a>
                     </li>
                     <li class="{{ (request()->is('admin/catalog/categories*')) ? 'active' : '' }}">
                        <a href="{{ route('categories.index') }}">
                        <i class="bi bi-dash"></i> 
                        <span>{{ __('Categories') }}</span>
                        </a>
                     </li>
                     <li class="{{ (request()->is('admin/catalog/brands*')) ? 'active' : '' }}">
                        <a href="{{ route('brands.index') }}">
                        <i class="bi bi-dash"></i> 
                        <span>{{ __('Brands') }}</span>
                        </a>
                     </li>
                     <li class="{{ (request()->is('admin/catalog/tags*')) ? 'active' : '' }}">
                        <a href="{{ route('tags.index') }}">
                        <i class="bi bi-dash"></i> 
                        <span>{{ __('Tags') }}</span>
                        </a>
                     </li>
                  </div>
               </ul>
            </div>
         </li>
         <li class="{{ (request()->is('admin/users*')) ? 'active' : '' }}">
            <a href="{{ route('users.index') }}">
            <i class="bi bi-people"></i> 
            <span>{{ __('Users') }}</span> 
            </a>
         </li>
         @role('super-user')
         <li class="{{ (request()->is('admin/roles*')) ? 'active' : '' }}">
            <a href="{{ route('roles.index') }}">
            <i class="bi bi-shield"></i>
            <span>{{ __('Roles') }}</span> 
            </a>
         </li>
         @endrole
      </ul>
   </nav>
</aside>
<!-- /Sidebar -->