export interface Toast {
    message: string;
    type: 'info' | 'success' | 'error';
    duration: number;
}