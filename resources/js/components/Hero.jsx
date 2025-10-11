// TestHero.jsx
import React, { Suspense, useRef, useState, useEffect } from "react";
import { Canvas, useFrame } from "@react-three/fiber";
import { useGLTF, OrbitControls } from "@react-three/drei";

// -------------------- PhoneModel --------------------
function PhoneModel({ modelPath }) {
  const group = useRef();
  const [scene, setScene] = useState(null);
  const [error, setError] = useState(null);

  // ✅ مدل را در useEffect لود می‌کنیم تا loop ایجاد نشود
  useEffect(() => {
    let active = true;

    const loadModel = async () => {
      try {
        const gltf = await useGLTF(modelPath);
        if (active) setScene(gltf.scene);
      } catch (err) {
        console.error("❌ خطا در لود مدل:", err);
        if (active) setError(err);
      }
    };

    loadModel();

    // cleanup برای جلوگیری از memory leak
    return () => {
      active = false;
    };
  }, [modelPath]);

  // انیمیشن چرخش آرام مدل
  useFrame((_, delta) => {
    if (group.current) group.current.rotation.y += delta * 0.2;
  });

  // اگر خطا رخ داد → مکعب قرمز نمایش بده
  if (error) {
    return (
      <mesh>
        <boxGeometry args={[1, 1, 1]} />
        <meshStandardMaterial color="red" />
      </mesh>
    );
  }

  // تا وقتی مدل آماده نشده null برگردون
  if (!scene) return null;

  return <primitive ref={group} object={scene} scale={[1.2, 1.2, 1.2]} />;
}

// -------------------- ErrorBoundary --------------------
class ErrorBoundary extends React.Component {
  constructor(props) {
    super(props);
    this.state = { hasError: false, error: null };
  }

  static getDerivedStateFromError(error) {
    return { hasError: true, error };
  }

  componentDidCatch(error, info) {
    console.error("🚨 خطای React در Canvas:", error, info);
  }

  render() {
    if (this.state.hasError) {
      return (
        <div style={{ color: "red", textAlign: "center", marginTop: "40vh" }}>
          ⚠️ خطایی رخ داد! جزئیات در Console.
        </div>
      );
    }
    return this.props.children;
  }
}

// -------------------- TestHero --------------------
export default function TestHero() {
  const modelPath = "/models/phone.glb";

  return (
    <div
      style={{
        width: "100%",
        height: "100vh",
        background: "transparent",
        position: "fixed",
        top: 0,
        left: 0,
      }}
    >
      <ErrorBoundary>
        <Suspense
          fallback={
            <div
              style={{
                color: "white",
                textAlign: "center",
                paddingTop: "50vh",
              }}
            >
              ⏳ Loading 3D model...
            </div>
          }
        >
          <Canvas camera={{ position: [0, 1, 4], fov: 60 }}>
            {/* نور مناسب برای مدل */}
            <ambientLight intensity={1.2} />
            <directionalLight position={[5, 5, 5]} intensity={1.5} />
            <hemisphereLight intensity={0.4} />

            <PhoneModel modelPath={modelPath} />

            <OrbitControls enableZoom={false} />
          </Canvas>
        </Suspense>
      </ErrorBoundary>
    </div>
  );
}
