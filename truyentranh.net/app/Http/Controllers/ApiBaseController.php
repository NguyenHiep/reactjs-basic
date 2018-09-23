<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @SWG\Swagger(
 *     basePath="/api/v1",
 *     schemes={"http", "https"},
 *     host=L5_SWAGGER_CONST_HOST,
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="List api",
 *         description="
  API Authenticate info
  =====================
 * **API Request Token**: /oauth/token
 * **client_id**: 2
 * **client_secret**: sJgfCkJ41YDGtHZgfGQfYYLxdi1PIE3mdc1FRDmH
 * **username**: admin@gmail.com
 * **password**: admin123
 * **grant_type**: password
 * **API Refresh Token**: /oauth/token
 * **client_id**: 2
 * **client_secret**: sJgfCkJ41YDGtHZgfGQfYYLxdi1PIE3mdc1FRDmH
 * **grant_type**: refresh_token
 * **refresh_token**: (string)
 *",
 *         @SWG\Contact(
 *             email="minhhiep.q@gmail.com"
 *         ),
 *     )
 * )
 */
/**
 * @SWG\SecurityScheme(
 *   securityDefinition="passport",
 *   type="oauth2",
 *   tokenUrl="/oauth/token",
 *   flow="password",
 *   scopes={}
 * )
 */
/**
 * @SWG\Get(
 *      path="/projects",
 *      operationId="getProjectsList",
 *      tags={"Projects"},
 *      summary="Get list of projects",
 *      description="Returns list of projects",
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *       @SWG\Response(response=400, description="Bad request"),
 *       security={
 *           {"passport": {}}
 *       }
 *     )
 *
 * Returns list of projects
 */
/**
 * @SWG\Get(
 *      path="/projects/{id}",
 *      operationId="getProjectById",
 *      tags={"Projects"},
 *      summary="Get project information",
 *      description="Returns project data",
 *      @SWG\Parameter(
 *          name="id",
 *          description="Project id",
 *          required=true,
 *          type="integer",
 *          in="path"
 *      ),
 *      @SWG\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *      @SWG\Response(response=400, description="Bad request"),
 *      @SWG\Response(response=404, description="Resource Not Found"),
 *      security={
 *         {
 *             "passport": {"write:projects", "read:projects"}
 *         }
 *     },
 * )
 *
 */
class ApiBaseController extends AppBaseController
{

}
