import React from "react";

function ProductGrid() {
    const products = [
        {
            id: 1,
            name: "Dell Latitude 3420 14″ FHD i3-1115G4",
            description: "8GO RAM 256GO SSD (NEUF SANS EMBALLAGE)",
            image: "https://maxgaming.ma/wp-content/uploads/2023/12/dell-latitude-3420-i5-1135g7-8go-256go-ssd-14-maroc-Rabat-casa-1.jpg",
            price: "4 449,00",
            stockText: "Le dernier en stock",
            stockStatus: "red"
        },
        {
            id: 2,
            name: "Dell Latitude 3420 14″ FHD i3-1115G4",
            description: "8GO RAM 256GO SSD (NEUF SANS EMBALLAGE)",
            image: "https://maxgaming.ma/wp-content/uploads/2023/12/dell-latitude-3420-i5-1135g7-8go-256go-ssd-14-maroc-Rabat-casa-1.jpg",
            price: "4 449,00",
            stockText: "5 en stock",
            stockStatus: "blue"
        },
        {
            id: 3,
            name: "Dell Latitude 3420 14″ FHD i3-1115G4",
            description: "8GO RAM 256GO SSD (NEUF SANS EMBALLAGE)",
            image: "https://maxgaming.ma/wp-content/uploads/2023/12/dell-latitude-3420-i5-1135g7-8go-256go-ssd-14-maroc-Rabat-casa-1.jpg",
            price: "4 449,00",
            stockText: "En stock",
            stockStatus: "green"
        },
        {
            id: 4,
            name: "Dell Latitude 3420 14″ FHD i3-1115G4",
            description: "8GO RAM 256GO SSD (NEUF SANS EMBALLAGE)",
            image: "https://maxgaming.ma/wp-content/uploads/2023/12/dell-latitude-3420-i5-1135g7-8go-256go-ssd-14-maroc-Rabat-casa-1.jpg",
            price: "4 449,00",
            stockText: "En stock",
            stockStatus: "green"
        }
    ];

    return (
        <div className="lg:col-span-3">
            <ul className="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                {products.map(product => (
                    <li key={product.id} className="border px-4 pb-4 rounded-lg border-gray-300">
                        <a href="#" className="group block overflow-hidden">
                            <img
                                src={product.image}
                                alt={product.name}
                                className="h-[180px] w-full object-cover transition duration-500 group-hover:scale-105 sm:w-[180px]"
                            />

                            <div className="relative bg-white pt-3">
                                <h3 className="text-sm font-medium text-gray-900 group-hover:underline group-hover:underline-offset-4">
                                    {product.name}
                                </h3>

                                <p className="mt-1 text-sm text-gray-700">
                                    {product.description}
                                </p>
                            </div>

                            <div className="mt-4">
                                <div className="mb-2">
                                    <span className={`inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset ${product.stockStatus === "red"
                                            ? "bg-red-50 text-red-700 ring-red-600/20"
                                            : product.stockStatus === "blue"
                                                ? "bg-blue-50 text-blue-700 ring-blue-600/20"
                                                : "bg-green-50 text-green-700 ring-green-600/20"
                                        }`}>
                                        &#8226; {product.stockText}
                                    </span>
                                </div>

                                <div className="mb-3">
                                    <span className="text-xl font-bold text-pink-600">{product.price} MAD</span>
                                </div>

                                <div>
                                    <button className="w-full py-3 bg-pink-600 text-white text-sm font-medium rounded hover:bg-pink-700">
                                        Ajouter Au Panier
                                    </button>
                                </div>
                            </div>
                        </a>
                    </li>
                ))}
            </ul>
        </div>
    );
}

export default ProductGrid;
