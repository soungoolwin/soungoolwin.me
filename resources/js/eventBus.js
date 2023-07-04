// import { reactive, provide, inject } from "vue";

// const eventBus = reactive({
//     listeners: {},
//     on(event, callback) {
//         if (!eventBus.listeners[event]) {
//             eventBus.listeners[event] = [];
//         }
//         eventBus.listeners[event].push(callback);
//     },
//     off(event, callback) {
//         if (eventBus.listeners[event]) {
//             eventBus.listeners[event] = eventBus.listeners[event].filter(
//                 (cb) => cb !== callback
//             );
//         }
//     },
//     emit(event, ...args) {
//         if (eventBus.listeners[event]) {
//             eventBus.listeners[event].forEach((callback) => callback(...args));
//         }
//     },
//     setFlashMessage: null, // Placeholder for setFlashMessage function
// });

// export function provideEventBus(app) {
//     app.provide("eventBus", eventBus);
// }

// export function useEventBus() {
//     const eventBus = inject("eventBus");
//     if (!eventBus) {
//         throw new Error("Event bus not provided");
//     }
//     return eventBus;
// }

import mitt from "mitt";

const eventBus = mitt();

function provideEventBus(app) {
    app.provide("eventBus", eventBus);
}

function useEventBus() {
    const eventBus = inject("eventBus");
    if (!eventBus) {
        throw new Error("Event bus not provided");
    }
    return eventBus;
}

export { provideEventBus, useEventBus };
export default eventBus;
