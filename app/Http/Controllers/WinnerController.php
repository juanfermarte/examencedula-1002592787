<?php
namespace App\Http\Controllers;

use App\Models\Winner;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class WinnerController extends Controller
{
    // Obtener ganadores con paginación
    public function index(Request $request)
    {
        try {
            $winners = Winner::whereNull('deleted_at')->paginate(2);
            return response()->json($winners);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }
    }

    // Actualizar un ganador específico
    public function update(Request $request, $id)
    {
        try {
            $winner = Winner::findOrFail($id);
            $winner->update($request->all());
            return response()->json(['message' => 'Winner updated successfully', 'winner' => $winner]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Winner not found', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }
    }

    // Eliminar un ganador (SoftDelete)
    public function destroy($id)
    {
        try {
            $winner = Winner::findOrFail($id);
            $winner->delete();
            return response()->json(['message' => 'Winner deleted successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Winner not found', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }
    }

    // Restaurar un ganador eliminado
    public function restore($id)
    {
        try {
            $winner = Winner::withTrashed()->findOrFail($id);
            $winner->restore();
            return response()->json(['message' => 'Winner restored successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Winner not found', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }
    }

    // Generar 1000 ganadores aleatorios
    public function generate()
    {
        try {
            $faker = Faker::create();
            for ($i = 0; $i < 1000; $i++) {
                Winner::create([
                    'name' => $faker->name,
                    'email' => $faker->unique()->safeEmail,
                    'city' => $faker->city,
                    'country' => $faker->country
                ]);
            }
            return response()->json(['message' => '1000 winners generated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }
    }
}