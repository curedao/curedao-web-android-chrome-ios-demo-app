"use client";
import { Icons } from "@/components/icons";
import { FC, useEffect, useState } from "react";
import { UserVariable } from "@/types/models/UserVariable";
import { DashboardHeader } from "@/components/pages/dashboard/dashboard-header";
import { DateRangePicker } from "@/components/date-range-picker";
import { UserVariableOperationsButton } from "@/components/userVariable/user-variable-operations-button";
import { cn } from "@/lib/utils";
import { buttonVariants } from "@/components/ui/button";
import { DataTable } from "@/components/data-table";
import { measurementColumns } from "@/components/userVariable/measurements/measurements-columns";

type UserVariableOverviewProps = {
  user: {
    id: string;
  };
  variableId: number;
};

export const UserVariableOverview: FC<UserVariableOverviewProps> = ({ user, variableId }) => {

  const [userVariable, setUserVariable] = useState<UserVariable>();
  const [isLoading, setIsLoading] = useState(true); // Add a loading state
  const

  useEffect(() => {
    setIsLoading(true); // Set loading to true when starting to fetch
    const url = `/api/dfda/variables?variableId=${variableId}&includeCharts=1`;

    fetch(url)
      .then(response => response.json())
      .then(userVariable => {
        setUserVariable(userVariable);
        setIsLoading(false); // Set loading to false once data is fetched
      })
      .catch(error => {
        console.error('Error fetching user variables:', error);
        setIsLoading(false); // Ensure loading is set to false even if there's an error
      });

  }, [user, variableId]);

  if (isLoading) {
    return <div>Loading...</div>; // Show a loader or a loading component
  }

  // Ensure userVariable is defined before trying to access its properties
  if (!userVariable) {
    return <div>No data found.</div>; // Handle the case where userVariable is undefined
  }



  return (

    <><DashboardHeader
      heading={`${userVariable.name} Stats`}
      text={userVariable.description}
    >
      <div className="flex flex-col items-stretch gap-2 md:items-end">
        <DateRangePicker />
        <UserVariableOperationsButton
          userVariable={userVariable}
        >
          <div
            className={cn(buttonVariants({ variant: "outline" }), "w-full")}
          >
            <Icons.down className="mr-2 h-4 w-4" />
            Actions
          </div>
        </UserVariableOperationsButton>
      </div>
    </DashboardHeader>
    <DataTable columns={measurementColumns} data={userVariable.measurements ?? []}>
      Measurements
    </DataTable>
    </>
  )
}