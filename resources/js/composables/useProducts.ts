import type { ProductForm } from '@/types/interfaces/forms/productForm';
import type { Product } from '@/types/interfaces/models/product';
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';

export function useProducts() {
    // Form state
    const form = ref<ProductForm>({
        name: null,
        category_id: null,
    });

    // Modal state
    const isOpen = ref(false);
    const requiresConfirmation = ref(false);
    const isLoading = ref(false);
    const productToDelete = ref<number | null>(null);

    function openModal() {
        isOpen.value = true;
        form.value = { name: null, category_id: null };
    }

    function closeModal() {
        isOpen.value = false;
    }

    function openConfirmationModal(productId: number) {
        productToDelete.value = productId;
        requiresConfirmation.value = true;
    }

    function closeConfirmationModal() {
        requiresConfirmation.value = false;
        productToDelete.value = null;
    }

    function addProduct(formData: ProductForm) {
        isLoading.value = true;
        router.post(
            '/add-product',
            {
                name: formData.name,
                category_id: formData.category_id,
            },
            {
                onFinish: () => {
                    isLoading.value = false;
                },
            },
        );
    }

    function confirmDeleteProduct() {
        if (productToDelete.value !== null) {
            router.post(`/delete-product/${productToDelete.value}`);
            closeConfirmationModal();
        }
    }

    function addProductToCart(product: Product) {
        const cart = localStorage.getItem('cart');

        if (cart) {
            const items = JSON.parse(cart);
            const existingProduct = items.find((item: Product & { quantity: number }) => item.id === product.id);

            if (existingProduct) {
                existingProduct.quantity += 1;
            } else {
                items.push({ ...product, quantity: 1 });
            }

            localStorage.setItem('cart', JSON.stringify(items));
        } else {
            localStorage.setItem('cart', JSON.stringify([{ ...product, quantity: 1 }]));
        }

        window.dispatchEvent(new Event('cart-updated'));
    }

    return {
        form,
        isOpen,
        requiresConfirmation,
        isLoading,
        productToDelete,
        openModal,
        closeModal,
        openConfirmationModal,
        closeConfirmationModal,
        addProduct,
        confirmDeleteProduct,
        addProductToCart
    };
}
