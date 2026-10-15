import React, { ReactNode } from 'react';

interface SectionWrapperProps {
    children: ReactNode;
    outerClass?: string;
}

// 2. Apply the interface to the component
export default function SectionWrapper({ children, outerClass = "" }: SectionWrapperProps) {
    return (
        <section className={`pb-20 pl-30 pr-30 2xl:pl-60 2xl:pr-60 ${outerClass}`}>
            <div className="section-inner">
                {children}
            </div>
        </section>
    );
}