import type { ProductForm } from '@/types/interfaces/forms/productForm';
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

    function addProduct(formData: ProductForm, errors: Record<string, any>, onFinish?: () => void) {
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
                    if (Object.keys(errors ?? {}).length === 0) {
                        isOpen.value = false;
                    }
                    if (onFinish) onFinish();
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
    };
}
