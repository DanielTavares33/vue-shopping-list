import { ref } from 'vue';
import type { Toast } from '@/types/interfaces/toast';

export function useToast() {
    const toasterMessage = ref<string>('');
    const toasterType = ref<'info' | 'success' | 'error'>('success');

    function showToast(toast: Toast) {
        toasterMessage.value = toast.message;
        toasterType.value = toast.type;
        setTimeout(() => {
            toasterMessage.value = '';
            toasterType.value = 'success';
        }, toast.duration);
    }

    return {
        toasterMessage,
        toasterType,
        showToast
    };
}
