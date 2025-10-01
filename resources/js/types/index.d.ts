export interface Auth {
    user: User;
    permissions: {
        product: {
            create: boolean;
            // update?: boolean;
            // delete?: boolean;
        };
    };
}

export type AppPageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
};

export interface User {
    id: number;
    name: string;
    email: string;
}
