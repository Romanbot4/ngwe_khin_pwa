import { useLayoutEffect, useState } from "react";

export default function useScreenSize() {
    const [size, setSize] = useState([window.innerWidth, window.innerHeight]);

    useLayoutEffect(() => {
        function updateSize() {
            setSize([window.innerWidth, window.innerHeight])
        }

        window.addEventListener("resize", updateSize)

        return () => window.removeEventListener("resize", updateSize);
    }, [])

    return size
}
