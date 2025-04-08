import React from "react";

function Sidebar() {
  return (
    <div className="hidden space-y-4 lg:block">
      <div>
        <label htmlFor="SortBy" className="block text-xs font-medium text-gray-700">Trier Par</label>
        
        <select id="SortBy" className="mt-1 rounded-sm border-gray-300 text-sm">
          <option>Trier Par</option>
          <option value="Title, DESC">Nom, DESC</option>
          <option value="Title, ASC">Nom, ASC</option>
          <option value="Price, DESC">Prix, DESC</option>
          <option value="Price, ASC">Prix, ASC</option>
        </select>
      </div>
      
      <div>
        <p className="block text-xs font-medium text-gray-700">Filtres</p>
        
        <div className="mt-1 space-y-2">
          <details className="overflow-hidden rounded-sm border border-gray-300 [&_summary::-webkit-details-marker]:hidden">
            <summary className="flex cursor-pointer items-center justify-between gap-2 p-4 text-gray-900 transition">
              <span className="text-sm font-medium">Disponibilité</span>
              
              <span className="transition group-open:-rotate-180">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  strokeWidth="1.5"
                  stroke="currentColor"
                  className="size-4"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                  />
                </svg>
              </span>
            </summary>
            
            <div className="border-t border-gray-200 bg-white">
              <ul className="space-y-1 border-t border-gray-200 p-4">
                <li>
                  <label htmlFor="FilterInStock" className="inline-flex items-center gap-2">
                    <input
                      type="checkbox"
                      id="FilterInStock"
                      className="size-5 rounded-sm border-gray-300 shadow-sm"
                      defaultChecked
                    />
                    
                    <span className="text-sm font-medium text-gray-700">En Stock</span>
                  </label>
                </li>
              </ul>
            </div>
          </details>
          
          <details className="overflow-hidden rounded-sm border border-gray-300 [&_summary::-webkit-details-marker]:hidden">
            <summary className="flex cursor-pointer items-center justify-between gap-2 p-4 text-gray-900 transition">
              <span className="text-sm font-medium">Prix</span>
              
              <span className="transition group-open:-rotate-180">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  strokeWidth="1.5"
                  stroke="currentColor"
                  className="size-4"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                  />
                </svg>
              </span>
            </summary>
            
            <div className="border-t border-gray-200 bg-white">
              <header className="flex items-center justify-between p-4">
                <span className="text-sm text-gray-700">Le prix le plus élevé est 5000 MAD</span>
              </header>
              
              <div className="border-t border-gray-200 p-4">
                <div className="flex justify-between gap-4">
                  <label htmlFor="FilterPriceFrom" className="flex items-center gap-2">
                    <span className="text-sm text-gray-600">MAD</span>
                    
                    <input
                      type="number"
                      id="FilterPriceFrom"
                      placeholder="De"
                      className="w-full rounded-md border-gray-200 shadow-xs sm:text-sm"
                    />
                  </label>
                  
                  <label htmlFor="FilterPriceTo" className="flex items-center gap-2">
                    <span className="text-sm text-gray-600">MAD</span>
                    
                    <input
                      type="number"
                      id="FilterPriceTo"
                      placeholder="À"
                      className="w-full rounded-md border-gray-200 shadow-xs sm:text-sm"
                    />
                  </label>
                </div>
              </div>
            </div>
          </details>
          
          <details className="overflow-hidden rounded-sm border border-gray-300 [&_summary::-webkit-details-marker]:hidden">
            <summary className="flex cursor-pointer items-center justify-between gap-2 p-4 text-gray-900 transition">
              <span className="text-sm font-medium">Processeur</span>
              
              <span className="transition group-open:-rotate-180">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  strokeWidth="1.5"
                  stroke="currentColor"
                  className="size-4"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                  />
                </svg>
              </span>
            </summary>
            
            <div className="border-t border-gray-200 bg-white">
              <ul className="space-y-1 border-t border-gray-200 p-4">
                <li>
                  <label htmlFor="FilterIntel" className="inline-flex items-center gap-2">
                    <input
                      type="checkbox"
                      id="FilterIntel"
                      className="size-5 rounded-sm border-gray-300 shadow-sm"
                      defaultChecked
                    />
                    
                    <span className="text-sm font-medium text-gray-700">Intel Core i3</span>
                  </label>
                </li>
                <li>
                  <label htmlFor="FilterIntel5" className="inline-flex items-center gap-2">
                    <input
                      type="checkbox"
                      id="FilterIntel5"
                      className="size-5 rounded-sm border-gray-300 shadow-sm"
                    />
                    
                    <span className="text-sm font-medium text-gray-700">Intel Core i5</span>
                  </label>
                </li>
                <li>
                  <label htmlFor="FilterIntel7" className="inline-flex items-center gap-2">
                    <input
                      type="checkbox"
                      id="FilterIntel7"
                      className="size-5 rounded-sm border-gray-300 shadow-sm"
                    />
                    
                    <span className="text-sm font-medium text-gray-700">Intel Core i7</span>
                  </label>
                </li>
              </ul>
            </div>
          </details>
        </div>
      </div>
    </div>
  );
}

export default Sidebar;
