import React from 'react';

export default function Home() {
    return (
        <div className="min-h-screen bg-gray-100 flex items-center justify-center">
            <div className="bg-white p-8 rounded-xl shadow-md max-w-md w-full text-center">
                <h1 className="text-3xl font-bold text-gray-900">Cuisine Webapp</h1>
                <p className="text-gray-600 mt-2">
                    Successfully migrated from Blade to React, TypeScript, and Inertia.js!
                </p>
            </div>
        </div>
    );
}