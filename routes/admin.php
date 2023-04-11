<?php
//admin routes
Route::get('/Admin', [App\Http\Controllers\AdminController::class, 'index'])->name('Admin');
Route::get('/AllAdmin', [App\Http\Controllers\AdminController::class, 'show'])->name('allAdmin');
Route::get('/addAdmin', [App\Http\Controllers\AdminController::class, 'create'])->name('addAdmin');
Route::get('/editAdmin/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('editAdmin');
Route::post('/storeAdmin', [App\Http\Controllers\AdminController::class, 'store'])->name('storeAdmin');
Route::put('/updateAdmin/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('updateAdmin');
Route::get('/deleteAdmin/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('deleteAdmin');

//category route
Route::get('/Category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('/addCategory', [App\Http\Controllers\CategoryController::class, 'create'])->name('addCategory');
Route::get('/editCategory/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('editCategory');
Route::post('/storeCategory', [App\Http\Controllers\CategoryController::class, 'store'])->name('storeCategory');
Route::put('/updateCategory/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('updateCategory');
Route::get('/deleteCategory/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('deleteCategory');

//tag route
Route::get('/Tag', [App\Http\Controllers\TagController::class, 'index'])->name('Tag');
Route::get('/addTag', [App\Http\Controllers\TagController::class, 'create'])->name('addTag');
Route::get('/editTag/{id}', [App\Http\Controllers\TagController::class, 'edit'])->name('editTag');
Route::post('/storeTag', [App\Http\Controllers\TagController::class, 'store'])->name('storeTag');
Route::put('/updateTag/{id}', [App\Http\Controllers\TagController::class, 'update'])->name('updateTag');
Route::get('/deleteTag/{id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('deleteTag');

//product route
Route::get('/Product', [App\Http\Controllers\ProductController::class, 'index'])->name('Product');
Route::get('/addProduct', [App\Http\Controllers\ProductController::class, 'create'])->name('addProduct');
Route::get('/editProduct/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('editProduct');
Route::post('/storeProduct', [App\Http\Controllers\ProductController::class, 'store'])->name('storeProduct');
Route::put('/updateProduct/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('updateProduct');
Route::get('/deleteProduct/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('deleteProduct');

//product_prop route
Route::put('/updateProductProp/{id}', [App\Http\Controllers\ProductPropController::class, 'update'])->name('updateProductProp');
Route::delete('/deleteProductProp/{id}', [App\Http\Controllers\ProductPropController::class, 'destroy'])->name('deleteProductProp');

//product_images route
Route::post('/addProductImage', [App\Http\Controllers\ProductImageController::class, 'store'])->name('addProductImage');
Route::delete('/deleteProductImage/{id}', [App\Http\Controllers\ProductImageController::class, 'destroy'])->name('deleteProductImage');

